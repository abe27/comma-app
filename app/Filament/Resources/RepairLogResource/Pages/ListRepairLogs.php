<?php

namespace App\Filament\Resources\RepairLogResource\Pages;

use App\Filament\Resources\RepairLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRepairLogs extends ListRecords
{
    protected static string $resource = RepairLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make()
            //     ->label("เพิ่มข้อมูลใหม่")
            //     ->icon('heroicon-o-plus-circle'),
        ];
    }
}
