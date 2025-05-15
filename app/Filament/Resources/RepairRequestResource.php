<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RepairRequestResource\Pages;
use App\Filament\Resources\RepairRequestResource\RelationManagers;
use App\Models\Device;
use App\Models\DeviceType;
use App\Models\RepairRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;
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
        return true;
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
                Forms\Components\Section::make('ข้อมูลเบื้องต้น')
                    ->compact()
                    ->collapsible()
                    ->columns(4)
                    ->columnSpanFull()
                    ->schema([
                        // Forms\Components\TextInput::make('user_id')
                        //     ->required()
                        //     ->maxLength(26),
                        Forms\Components\Select::make('device_type_id')
                            ->label('Device Type')
                            ->required()
                            ->searchable()
                            ->options(fn() => DeviceType::all()->pluck('name', 'id')->toArray()),
                        Forms\Components\Select::make('device_id')
                            ->label('Device')
                            ->required()
                            ->searchable()
                            ->options(fn(Get $get) => $get('device_type_id') ? Device::where('device_type_id', $get('device_type_id'))->pluck('asset_tag', 'id')->toArray() : []),
                        // Forms\Components\TextInput::make('job_no')
                        //     ->required()
                        //     ->maxLength(255),
                        Forms\Components\TextInput::make('name')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->columnStart(1),
                        Forms\Components\RichEditor::make('description')
                            ->hiddenOn('edit')
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('remark')
                            ->hiddenOn(['create', 'edit'])
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('location')
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\FileUpload::make('attachments')
                            ->multiple()
                            ->panelLayout('grid')
                            ->reorderable()
                            ->appendFiles()
                            ->openable()
                            ->downloadable()
                            ->previewable(true)
                            ->uploadingMessage('Uploading attachment...')
                            ->directory('request-attachments')
                            ->visibility('public')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(function () {
                $repairs = static::getModel()::where('job_date', '>=', "01-" . now()->format('m-Y'));
                if (in_array(Auth::user()->rule, [\App\Enums\Rules::Employee])) {
                    return $repairs->where('assigned_to', Auth::user()->id)->orderBy('updated_at');
                }
                return $repairs->orderBy('updated_at');
            })
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
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    // public static function infolist(Infolist $infolist): Infolist
    // {
    //     return $infolist
    //         ->schema([
    //             Infolists\Components\Section::make('ข้อมูลเบื้องต้น')
    //                 ->compact()
    //                 ->columns(4)
    //                 ->columnSpanFull()
    //                 ->schema([
    //                     Infolists\Components\TextEntry::make('deviceType.name')
    //                         ->badge(),
    //                     Infolists\Components\TextEntry::make('device.brand')
    //                         ->badge(),
    //                     Infolists\Components\TextEntry::make('device.model')
    //                         ->badge(),
    //                     Infolists\Components\TextEntry::make('device.asset_tag')
    //                         ->badge(),
    //                 ]),
    //         ]);
    // }

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
            'view' => Pages\ViewRepairRequest::route('/{record}'),
            'edit' => Pages\EditRepairRequest::route('/{record}/edit'),
        ];
    }
}
