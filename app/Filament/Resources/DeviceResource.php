<?php

namespace App\Filament\Resources;

use App\Enums\DeviceStatus;
use App\Filament\Resources\DeviceResource\Pages;
use App\Filament\Resources\DeviceResource\RelationManagers;
use App\Models\Device;
use App\Models\DeviceType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class DeviceResource extends Resource
{
    protected static ?string $model = Device::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Device';

    protected static ?string $slug = 'device';

    protected static ?int $navigationSort = 6;

    // protected static ?string $navigationParentItem = 'Products';

    protected static ?string $navigationGroup = 'Settings';

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()->rule == \App\Enums\Rules::Admin;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'name',
            'asset_tag',
            'serial_number',
            'brand',
            'model',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Information')
                    ->compact()
                    ->columns(3)
                    ->schema([
                        Forms\Components\Select::make('device_type_id')
                            ->required()
                            ->searchable()
                            ->options(fn() => DeviceType::all()->pluck('name', 'id')->toArray()),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->columnStart(1),
                        Forms\Components\TextInput::make('asset_tag')
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\TextInput::make('serial_number')
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\TextInput::make('brand')
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\TextInput::make('model')
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->searchable()
                            ->options(fn() => \App\Enums\DeviceStatus::class)
                            ->columnStart(1),
                    ]),
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
                Tables\Columns\TextColumn::make('asset_tag')
                    ->searchable(),
                Tables\Columns\TextColumn::make('serial_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('brand')
                    ->searchable(),
                Tables\Columns\TextColumn::make('model')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deviceType.name')
                    ->searchable()
                    ->badge(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(Device $record) => $record->status->color()),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d-m-Y H:s:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d-m-Y H:s:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('device_type_id')
                    ->label('Device Type')
                    ->searchable()
                    ->multiple()
                    ->options(fn() => DeviceType::all()->pluck('name', 'id')->toArray()),
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->searchable()
                    ->multiple()
                    ->options(fn() => DeviceStatus::class),
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
            'index' => Pages\ListDevices::route('/'),
            'create' => Pages\CreateDevice::route('/create'),
            'edit' => Pages\EditDevice::route('/{record}/edit'),
        ];
    }
}
