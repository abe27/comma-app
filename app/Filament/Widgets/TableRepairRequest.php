<?php

namespace App\Filament\Widgets;

use App\Models\RepairRequest;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TableRepairRequest extends BaseWidget
{
    protected static ?int $sort = 1;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $pollingInterval = '60s';

    public function table(Table $table): Table
    {
        return $table
            ->query(function () {
                return RepairRequest::orderBy('updated_at', 'desc');
            })
            ->defaultPaginationPageOption(10)
            ->searchable()
            ->striped()
            ->columns([
                Tables\Columns\TextColumn::make('rowid')
                    ->label('ID')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('job_date')
                    ->date('d-m-Y')
                    ->searchable(),
                Tables\Columns\TextColumn::make('job_no')
                    ->label('Job No.')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deviceType.name')
                    ->label('Device Type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('device.asset_tag')
                    ->label('Tag')
                    ->searchable()
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Issue')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Request By')
                    ->searchable()
                    ->badge()
                    ->color('warning')
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('assigned')
                    ->label('Assigned')
                    ->searchable()
                    ->badge()
                    ->color('success')
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('actionStatus.name')
                    ->label('Action')
                    ->badge()
                    ->color(fn(RepairRequest $record) => $record->actionStatus->color->value)
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d-m-Y H:s:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d-m-Y H:s:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ]);
    }
}
