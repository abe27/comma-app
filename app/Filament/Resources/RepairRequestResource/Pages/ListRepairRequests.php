<?php

namespace App\Filament\Resources\RepairRequestResource\Pages;

use App\Filament\Resources\RepairRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListRepairRequests extends ListRecords
{
    protected static string $resource = RepairRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label("Create")
                ->icon('heroicon-o-plus-circle')
                ->visible(fn() => Auth::user()->rule == \App\Enums\Rules::User),
        ];
    }
}
