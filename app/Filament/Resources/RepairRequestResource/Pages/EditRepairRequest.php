<?php

namespace App\Filament\Resources\RepairRequestResource\Pages;

use App\Filament\Resources\RepairRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRepairRequest extends EditRecord
{
    protected static string $resource = RepairRequestResource::class;

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
