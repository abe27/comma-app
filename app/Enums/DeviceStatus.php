<?php

namespace App\Enums;

enum DeviceStatus: string
{
    case Active = 'ปกติ';
    case InRepair = 'กำลังส่งซ่อม';
    case Retired = 'ยกเลิกการใช้งาน';

    public function color(): string
    {
        return match ($this) {
            self::Active => 'success',
            self::InRepair => 'primary',
            self::Retired => 'danger',
        };
    }
}
