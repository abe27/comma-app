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
        return true;
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
                Tables\Columns\TextColumn::make('rowid')
                    ->label('ID')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('repair.job_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('oldStatus.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('newStatus.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('note')
                    ->html(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Update By')
                    ->searchable()
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d-m-Y H:s:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d-m-Y H:s:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
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
            // 'create' => Pages\CreateRepairLog::route('/create'),
            // 'edit' => Pages\EditRepairLog::route('/{record}/edit'),
        ];
    }
}
