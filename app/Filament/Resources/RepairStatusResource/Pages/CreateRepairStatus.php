<?php

namespace App\Filament\Resources\RepairStatusResource\Pages;

use App\Filament\Resources\RepairStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRepairStatus extends CreateRecord
{
    protected static string $resource = RepairStatusResource::class;

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
