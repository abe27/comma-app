<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RepairLogResource\Pages;
use App\Filament\Resources\RepairLogResource\RelationManagers;
use App\Models\RepairLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class RepairLogResource extends Resource
{
    protected static ?string $model = RepairLog::class;

    protected static ?string $navigationLabel = 'Logging';

    protected static ?string $slug = 'logs';

    protected static ?int $navigationSort = 2;

    // protected static ?string $navigationParentItem = 'Products';

    protected static ?string $navigationGroup = 'Logs';

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()->rule == \App\Enums\Rules::Admin;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'note',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('repair_request_id')
                    ->required()
                    ->maxLength(26),
                Forms\Components\TextInput::make('updated_by_id')
                    ->required()
                    ->maxLength(26),
                Forms\Components\TextInput::make('old_status_id')
                    ->required()
                    ->maxLength(26),
                Forms\Components\TextInput::make('new_status_id')
                    ->required()
                    ->maxLength(26),
                Forms\Components\Textarea::make('note')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('repair_request_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_by_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('old_status_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('new_status_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRepairLogs::route('/'),
            'create' => Pages\CreateRepairLog::route('/create'),
            'edit' => Pages\EditRepairLog::route('/{record}/edit'),
        ];
    }
}
