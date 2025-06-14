<?php

namespace App\Filament\Resources\ActionStatusResource\Pages;

use App\Filament\Resources\ActionStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListActionStatuses extends ListRecords
{
    protected static string $resource = ActionStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label("เพิ่มข้อมูลใหม่")
                ->icon('heroicon-o-plus-circle'),
        ];
    }
}
