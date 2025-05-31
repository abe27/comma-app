<?php

namespace App\Filament\Exports;

use App\Models\RepairRequest;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class RepairRequestExporter extends Exporter
{
    protected static ?string $model = RepairRequest::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('rowid')
                ->label('ID'),
            ExportColumn::make('user.name'),
            ExportColumn::make('deviceType.name'),
            ExportColumn::make('device.name'),
            ExportColumn::make('assignedTo.name'),
            ExportColumn::make('vendor.name'),
            ExportColumn::make('job_date'),
            ExportColumn::make('job_no'),
            ExportColumn::make('name'),
            ExportColumn::make('description'),
            ExportColumn::make('remark'),
            ExportColumn::make('attachments'),
            ExportColumn::make('location'),
            ExportColumn::make('actionStatus.name'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your repair request export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
