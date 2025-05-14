<?php

namespace App\Filament\Resources\RepairLogResource\Pages;

use App\Filament\Resources\RepairLogResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRepairLog extends CreateRecord
{
    protected static string $resource = RepairLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            $this->getCreateFormAction()
                ->formId('form')
                ->label('Save')
                ->color('success')
                ->icon('heroicon-o-check-circle')
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
}
