<?php

namespace App\Filament\Resources\ActionStatusResource\Pages;

use App\Filament\Resources\ActionStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateActionStatus extends CreateRecord
{
    protected static string $resource = ActionStatusResource::class;

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
