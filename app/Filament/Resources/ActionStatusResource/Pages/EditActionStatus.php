<?php

namespace App\Filament\Resources\ActionStatusResource\Pages;

use App\Filament\Resources\ActionStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditActionStatus extends EditRecord
{
    protected static string $resource = ActionStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
