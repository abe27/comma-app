<?php

namespace App\Filament\Resources\RepairRequestResource\Pages;

use App\Filament\Resources\RepairRequestResource;
use App\Models\ActionStatus;
use App\Models\RepairLog;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;
use Filament\Forms;
use Filament\Notifications\Notification;

class EditRepairRequest extends EditRecord
{
    protected static string $resource = RepairRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('reject')
                ->label('ยกเลิกคำขอ')
                ->color('danger')
                ->icon('heroicon-o-x-circle')
                ->hidden(fn() => Auth::user()->rule != \App\Enums\Rules::Admin || $this->record->actionStatus->value > 0)
                ->requiresConfirmation()
                ->form([
                    Forms\Components\RichEditor::make('remark')
                        ->required()
                        ->columnSpanFull()
                ])
                ->action(function (array $data) {
                    $oldStatus = $this->record->action_status_id;
                    $this->record->remark = $data['remark'];
                    $this->record->action_status_id = ActionStatus::where('value', 2)->first()->id;
                    $this->record->save();

                    // บันทึกประวัติ
                    $seq = RepairLog::where('repair_request_id', $this->record->id)->count();
                    RepairLog::create([
                        'seq' => $seq,
                        'repair_request_id' => $this->record->id,
                        'updated_by_id' => Auth::user()->id,
                        'old_status_id' => $oldStatus,
                        'new_status_id' => $this->record->action_status_id,
                        'note' => $data['remark'],
                    ]);


                    // แจ้งเตือนไปยัง User
                    $user = User::find($this->record->user_id);
                    Notification::make()
                        ->danger()
                        ->title("แจ้งเตือน")
                        ->body("Admin ได้ทำการยกเลิกรายการ " . $this->record->job_no . " แล้ว\nเนื่องจาก " . $data['remark'])
                        ->sendToDatabase($user);
                    return redirect()->to(route('filament.web.resources.repair-request.index'));
                }),
            Actions\Action::make('admin_assigned_to')
                ->label('มอบงานให้พนักงาน')
                ->hidden(fn() => Auth::user()->rule != \App\Enums\Rules::Admin || $this->record->actionStatus->value > 0)
                ->icon('heroicon-o-check-circle')
                ->requiresConfirmation()
                ->form([
                    Forms\Components\Select::make('assigned_to')
                        ->label('Assigned To')
                        ->required()
                        ->searchable()
                        ->options(fn() => User::where('rule', \App\Enums\Rules::Employee)->get()->pluck('name', 'id')->toArray())
                        ->columnSpanFull()
                ])
                ->action(function (array $data) {
                    $oldStatus = $this->record->action_status_id;
                    $this->record->assigned_to = $data['assigned_to'];
                    $this->record->action_status_id = ActionStatus::where('value', 1)->first()->id;
                    $this->record->save();

                    // บันทึกประวัติ
                    $seq = RepairLog::where('repair_request_id', $this->record->id)->count();
                    RepairLog::create([
                        'seq' => $seq,
                        'repair_request_id' => $this->record->id,
                        'updated_by_id' => Auth::user()->id,
                        'old_status_id' => $oldStatus,
                        'new_status_id' => $this->record->action_status_id,
                        'note' => "ส่งมอบงาน",
                    ]);


                    // แจ้งเตือนไปยัง User
                    $user = User::where("id", $this->record->user_id)->first();
                    Notification::make()
                        ->danger()
                        ->title("แจ้งเตือน")
                        ->body("Admin ได้มอบงานให้ " . $this->record->assignedTo->name . " แล้ว")
                        ->sendToDatabase($user);
                    return redirect()->to(route('filament.web.resources.repair-request.index'));
                }),
            // สำหรับพนักงาน IT
            Actions\Action::make('employee_receive')
                ->label("รับงาน")
                ->icon('heroicon-o-check-circle')
                ->visible(fn() => Auth::user()->rule == \App\Enums\Rules::Employee && $this->record->actionStatus->value == 1)
                ->action(function (array $data) {
                    $oldStatus = $this->record->action_status_id;
                    $this->record->action_status_id = ActionStatus::where('value', 4)->first()->id;
                    $this->record->save();

                    // บันทึกประวัติ
                    $seq = RepairLog::where('repair_request_id', $this->record->id)->count();
                    RepairLog::create([
                        'seq' => $seq,
                        'repair_request_id' => $this->record->id,
                        'updated_by_id' => Auth::user()->id,
                        'old_status_id' => $oldStatus,
                        'new_status_id' => $this->record->action_status_id,
                        'note' => "พนักงานกำลังดำเนินงาน",
                    ]);


                    // แจ้งเตือนไปยัง User
                    $user = User::where("id", $this->record->user_id)->first();
                    Notification::make()
                        ->danger()
                        ->title("แจ้งเตือน")
                        ->body("IT " . $this->record->actionStatus->name . " " . $this->record->job_no)
                        ->sendToDatabase($user);
                    return redirect()->to(route('filament.web.resources.repair-request.index'));
                }),
            Actions\Action::make('employee_success')
                ->label("ซ่อมเสร็จแล้ว")
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->visible(fn() => Auth::user()->rule == \App\Enums\Rules::Employee && in_array($this->record->actionStatus->value, [4, 7]))
                ->form([
                    Forms\Components\RichEditor::make('remark')
                        ->required()
                ])
                ->action(function (array $data) {
                    $oldStatus = $this->record->action_status_id;
                    $this->record->remark = $data["remark"];
                    $this->record->action_status_id = ActionStatus::where('value', 11)->first()->id;
                    $this->record->save();

                    // บันทึกประวัติ
                    $seq = RepairLog::where('repair_request_id', $this->record->id)->count();
                    RepairLog::create([
                        'seq' => $seq,
                        'repair_request_id' => $this->record->id,
                        'updated_by_id' => Auth::user()->id,
                        'old_status_id' => $oldStatus,
                        'new_status_id' => $this->record->action_status_id,
                        'note' => "ซ่อมเสร็จ รอตรวจสอบ",
                    ]);


                    // แจ้งเตือนไปยัง User
                    $user = User::where("id", $this->record->user_id)->first();
                    Notification::make()
                        ->danger()
                        ->title("แจ้งเตือน")
                        ->body($this->record->job_no . " " . $this->record->actionStatus->name)
                        ->sendToDatabase($user);
                    return redirect()->to(route('filament.web.resources.repair-request.index'));
                }),
            Actions\Action::make('send_to_vendor')
                ->label("ส่งงานให้ Vendor")
                ->color('warning')
                ->icon('heroicon-o-paper-airplane')
                ->visible(fn() => Auth::user()->rule == \App\Enums\Rules::Employee && $this->record->actionStatus->value == 4)
                ->requiresConfirmation()
                ->form([
                    Forms\Components\Select::make('vendor_id')
                        ->label('Vendor')
                        ->searchable()
                        ->options(fn() => \App\Models\Vendor::all()->pluck('name', 'id')->toArray()),
                ])
                ->action(function (array $data) {
                    $oldStatus = $this->record->action_status_id;
                    $this->record->vendor_id = $data["vendor_id"];
                    $this->record->action_status_id = ActionStatus::where('value', 7)->first()->id;
                    $this->record->save();

                    // บันทึกประวัติ
                    $seq = RepairLog::where('repair_request_id', $this->record->id)->count();
                    RepairLog::create([
                        'seq' => $seq,
                        'repair_request_id' => $this->record->id,
                        'updated_by_id' => Auth::user()->id,
                        'old_status_id' => $oldStatus,
                        'new_status_id' => $this->record->action_status_id,
                        'note' => "ส่งมอบงานให้ Vendor",
                    ]);


                    // แจ้งเตือนไปยัง User
                    $user = User::where("id", $this->record->user_id)->first();
                    Notification::make()
                        ->danger()
                        ->title("แจ้งเตือน")
                        ->body($this->record->job_no . " " . $this->record->actionStatus->name . " ให้ Vendor แล้ว")
                        ->sendToDatabase($user);
                    return redirect()->to(route('filament.web.resources.repair-request.index'));
                }),
            // $this->getSaveFormAction()
            //     ->icon('heroicon-o-check-circle')
            //     ->formId('form')
            //     ->visible(fn() => Auth::user()->rule == \App\Enums\Rules::Admin),
            // Actions\DeleteAction::make()
            //     ->icon('heroicon-o-x-circle')
            //     ->visible(fn() => Auth::user()->rule == \App\Enums\Rules::Admin),
        ];
    }

    protected function getFormActions(): array
    {
        return [
            // Actions\Action::make('close')->action('saveAndClose'),
        ];
    }

    public function getHeading(): string
    {
        $record = $this->getRecord();
        return $record->name;
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
