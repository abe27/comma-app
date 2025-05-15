<?php

namespace App\Filament\Resources\RepairRequestResource\Pages;

use App\Filament\Resources\RepairRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditRepairRequest extends EditRecord
{
    protected static string $resource = RepairRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            $this->getSaveFormAction()
                ->icon('heroicon-o-check-circle')
                ->formId('form')
                ->visible(fn() => Auth::user()->rule == \App\Enums\Rules::Admin),
            Actions\DeleteAction::make()
                ->icon('heroicon-o-x-circle')
                ->visible(fn() => Auth::user()->rule == \App\Enums\Rules::Admin),
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
