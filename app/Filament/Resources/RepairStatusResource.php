<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RepairStatusResource\Pages;
use App\Filament\Resources\RepairStatusResource\RelationManagers;
use App\Models\RepairStatus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class RepairStatusResource extends Resource
{
    protected static ?string $model = RepairStatus::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationLabel = 'Repair History';

    protected static ?string $slug = 'repair-history';

    protected static ?int $navigationSort = 2;

    // protected static ?string $navigationParentItem = 'Products';


    public static function shouldRegisterNavigation(): bool
    {
        // return Auth::user()->rule == \App\Enums\Rules::Admin;
        return false;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'comment',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('repair_request_id')
                    ->required()
                    ->maxLength(26),
                Forms\Components\TextInput::make('seq')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('assigned_to')
                    ->required()
                    ->maxLength(26),
                Forms\Components\Textarea::make('comment')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('action_status_id')
                    ->required()
                    ->maxLength(26),
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
                Tables\Columns\TextColumn::make('seq')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('assigned_to')
                    ->searchable(),
                Tables\Columns\TextColumn::make('action_status_id')
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
            'index' => Pages\ListRepairStatuses::route('/'),
            'create' => Pages\CreateRepairStatus::route('/create'),
            'edit' => Pages\EditRepairStatus::route('/{record}/edit'),
        ];
    }
}
