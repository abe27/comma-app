<?php

namespace App\Filament\Resources\RepairRequestResource\Pages;

use App\Filament\Resources\RepairRequestResource;
use App\Models\ActionStatus;
use App\Models\RepairLog;
use App\Models\RepairRequest;
use App\Models\User;
use Filament\Actions;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Auth;

class ViewRepairRequest extends ViewRecord
{
    protected static string $resource = RepairRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // ผู้ใช้งานรับงาน
            Actions\Action::make('user_success')
                ->label("รับอุปกรณ์")
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->visible(fn() => Auth::user()->rule == \App\Enums\Rules::User && $this->record->actionStatus->value == 11)
                ->action(function () {
                    $oldStatus = $this->record->action_status_id;
                    $this->record->action_status_id = ActionStatus::where('value', 12)->first()->id;
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
                    return redirect()->to(route('filament.web.resources.repair-request.index'));
                })
        ];
    }

    public function getHeading(): string
    {
        $record = $this->getRecord();
        return $record->job_no . "(" . $record->actionStatus->name . ")";
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
