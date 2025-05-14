<?php

namespace App\Filament\Resources\RepairLogResource\Pages;

use App\Filament\Resources\RepairLogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRepairLog extends EditRecord
{
    protected static string $resource = RepairLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
