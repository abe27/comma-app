<?php

namespace App\Filament\Widgets;

use App\Models\ActionStatus;
use App\Models\RepairRequest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $actionStatusDraft = RepairRequest::where('action_status_id', ActionStatus::where('value', 0)->first()->id)->count();
        $actionStatusWait = RepairRequest::where('action_status_id', ActionStatus::where('value', 1)->first()->id)->count();
        $actionStatusVendor = RepairRequest::where('action_status_id', ActionStatus::where('value', 7)->first()->id)->count();
        $actionStatusEnd = RepairRequest::where('action_status_id', ActionStatus::where('value', 12)->first()->id)->count();
        return [
            Stat::make('รอรับเรื่อง', $actionStatusDraft)
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('primary'),
            Stat::make('รอพนักงาน IT รับงาน', $actionStatusWait)
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('warning'),
            Stat::make('ส่งต่อ Vendor', $actionStatusVendor)
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('danger'),
            Stat::make('ปิดงาน', $actionStatusEnd)
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
        ];
    }
}
