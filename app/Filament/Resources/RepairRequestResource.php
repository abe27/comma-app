<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RepairRequestResource\Pages;
use App\Filament\Resources\RepairRequestResource\RelationManagers;
use App\Models\RepairRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class RepairRequestResource extends Resource
{
    protected static ?string $model = RepairRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-date-range';

    protected static ?string $navigationLabel = 'Repair Request';

    protected static ?string $slug = 'repair-request';

    protected static ?int $navigationSort = 1;

    // protected static ?string $navigationParentItem = 'Products';


    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()->rule == \App\Enums\Rules::Admin;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'name',
            'job_no',
            'description',
            'localtion',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('user_id')
                //     ->required()
                //     ->maxLength(26),
                Forms\Components\TextInput::make('device_type_id')
                    ->required()
                    ->maxLength(26),
                Forms\Components\TextInput::make('device_id')
                    ->required()
                    ->maxLength(26),
                // Forms\Components\TextInput::make('job_no')
                //     ->required()
                //     ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('location')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('action_status_id')
                    ->maxLength(26)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('device_type_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('device_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('job_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
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
            'index' => Pages\ListRepairRequests::route('/'),
            'create' => Pages\CreateRepairRequest::route('/create'),
            'edit' => Pages\EditRepairRequest::route('/{record}/edit'),
        ];
    }
}
