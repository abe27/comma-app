<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActionStatusResource\Pages;
use App\Filament\Resources\ActionStatusResource\RelationManagers;
use App\Models\ActionStatus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ActionStatusResource extends Resource
{
    protected static ?string $model = ActionStatus::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Status';

    protected static ?string $slug = 'status';

    protected static ?int $navigationSort = 4;

    // protected static ?string $navigationParentItem = 'Products';

    protected static ?string $navigationGroup = 'Settings';

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()->rule == \App\Enums\Rules::Admin;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'description'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
                Forms\Components\Select::make('color')
                    ->searchable()
                    ->options(fn() => \App\Enums\Colors::class)
                    ->default(\App\Enums\Colors::INFO),
                Forms\Components\Toggle::make('is_active')
                    ->label('Status')
                    ->columnStart(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rowid')
                    ->label('ID')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->html(),
                Tables\Columns\TextColumn::make('color')
                    ->badge()
                    ->color(fn(ActionStatus $record) => $record->color->value),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),
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
            'index' => Pages\ListActionStatuses::route('/'),
            'create' => Pages\CreateActionStatus::route('/create'),
            'edit' => Pages\EditActionStatus::route('/{record}/edit'),
        ];
    }
}
