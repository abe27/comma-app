<?php

namespace App\Filament\Resources\RepairRequestResource\Pages;

use App\Filament\Resources\RepairRequestResource;
use App\Mail\SendMail;
use App\Models\ActionStatus;
use App\Models\RepairLog;
use App\Models\RepairRequest;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CreateRepairRequest extends CreateRecord
{
    protected static string $resource = RepairRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            $this->getCreateFormAction()
                ->formId('form')
                ->label('Save')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->visible(fn() => Auth::user()->rule == \App\Enums\Rules::User)
        ];
    }

    protected function getFormActions(): array
    {
        return [
            // Actions\Action::make('close')->action('saveAndClose'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $lastJob = RepairRequest::whereYear('job_date', now()->format('Y'))->count() + 1;
        $data['job_no'] = "JOB" . Str::substr(now()->format('Ym'), 3) . str_pad($lastJob, 5, '0', STR_PAD_LEFT);
        $data['user_id'] = Auth::user()->id;
        $data['job_date'] = now();
        $data['action_status_id'] = ActionStatus::where("value", 0)->first()->id;
        return $data;
    }

    protected function afterCreate(): void
    {
        // บันทึกประวัติ
        $seq = RepairLog::where('repair_request_id', $this->record->id)->count();
        RepairLog::create([
            'seq' => $seq,
            'repair_request_id' => $this->record->id,
            'updated_by_id' => Auth::user()->id,
            'old_status_id' => null,
            'new_status_id' => $this->record->action_status_id,
            'note' => 'เปิดเอสารหมายเลข ' . $this->record->job_no,
        ]);

        // Send Mail
        Mail::to('krumii.it@gmail.com')->send(new SendMail(Auth::user()->name . "เปิด " . $this->record->job_no, "ผู้ดูแลระบบ"));

        // แจ้งเตือนไปยัง Admin
        $users = User::where('rule', \App\Enums\Rules::Admin)->get();
        foreach ($users as $user) {
            Notification::make()
                ->success()
                ->title(Auth::user()->name . "เปิด " . $this->record->job_no)
                ->body($this->record->name)
                ->sendToDatabase($user);
        }
    }
}
