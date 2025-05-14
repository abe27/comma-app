<?php

namespace App\Filament\Resources\VendorResource\Pages;

use App\Filament\Resources\VendorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVendors extends ListRecords
{
    protected static string $resource = VendorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label("Create")
                ->icon('heroicon-o-plus-circle'),
        ];
    }

    // public function getHeading(): string
    // {
    //     return 'ข้อมูลลักษณะการเสีย';
    // }
}
