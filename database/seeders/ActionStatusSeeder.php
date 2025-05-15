<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            ["name" => "รอรับเรื่อง", "value" => 0, "color" => \App\Enums\Colors::WARNING],
            ["name" => "รอพนักงาน IT รับงาน", "value" => 1, "color" => \App\Enums\Colors::PRIMARY],
            ["name" => "ยกเลิกคำขอ", "value" => 2, "color" => \App\Enums\Colors::DANGER],
            ["name" => "พนักงาน IT กำลังดำเนินการ", "value" => 4, "color" => \App\Enums\Colors::WARNING],
            ["name" => "กำลังซ่อม", "value" => 5, "color" => \App\Enums\Colors::WARNING],
            ["name" => "ซ่อมเสร็จ รอตรวจสอบ", "value" => 6, "color" => \App\Enums\Colors::INFO],
            ["name" => "ส่งต่อ Vendor", "value" => 7, "color" => \App\Enums\Colors::PRIMARY],
            ["name" => "รอ Vendor รับเรื่อง", "value" => 8, "color" => \App\Enums\Colors::PRIMARY],
            ["name" => "Vendor กำลังซ่อม", "value" => 9, "color" => \App\Enums\Colors::WARNING],
            ["name" => "Vendor ซ่อมเสร็จ รอตรวจสอบ", "value" => 10, "color" => \App\Enums\Colors::SUCCESS],
            ["name" => "รอผู้ใช้งานยืนยันผล", "value" => 11, "color" => \App\Enums\Colors::WARNING],
            ["name" => "ปิดงาน", "value" => 12, "color" => \App\Enums\Colors::SUCCESS],
        ];

        foreach ($status as $value) {
            \App\Models\ActionStatus::updateOrcreate(["name" => $value["name"]], $value);
        }
    }
}
