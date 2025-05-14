<?php

namespace App\Enums;

enum Rules: string
{
    case User = "ผู้ใช้งาน";
    case Admin = "ผู้ดูแลระบบ";
    case Employee = "พนักงาน IT";
    case Vendor = 'Vendor';

    public function color(): string
    {
        return match ($this) {
            self::User => 'success',
            self::Admin => 'danger',
            self::Employee => 'primary',
            self::Vendor => 'warning'
        };
    }
}
