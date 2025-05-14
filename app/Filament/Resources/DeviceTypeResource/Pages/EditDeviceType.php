<?php

namespace App\Filament\Resources\DeviceTypeResource\Pages;

use App\Filament\Resources\DeviceTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDeviceType extends EditRecord
{
    protected static string $resource = DeviceTypeResource::class;

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
