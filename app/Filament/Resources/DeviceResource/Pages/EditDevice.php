<?php

namespace App\Filament\Resources\DeviceResource\Pages;

use App\Filament\Resources\DeviceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDevice extends EditRecord
{
    protected static string $resource = DeviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            $this->getSaveFormAction()
                ->icon('heroicon-o-check-circle')
                ->formId('form'),
            Actions\DeleteAction::make()
                ->icon('heroicon-o-x-circle'),
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
