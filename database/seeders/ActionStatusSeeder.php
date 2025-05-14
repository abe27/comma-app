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
            ["name" => "รอรับเรื่อง", "color" => \App\Enums\Colors::WARNING],
            ["name" => "กำลังตรวจสอบ", "color" => \App\Enums\Colors::PRIMARY],
            ["name" => "รอมอบหมายงาน", "color" => \App\Enums\Colors::INFO],
            ["name" => "ยกเลิกคำขอ", "color" => \App\Enums\Colors::DANGER],
            ["name" => "รอพนักงาน IT ดำเนินการ", "color" => \App\Enums\Colors::WARNING],
            ["name" => "กำลังซ่อม", "color" => \App\Enums\Colors::WARNING],
            ["name" => "ซ่อมเสร็จ รอตรวจสอบ", "color" => \App\Enums\Colors::INFO],
            ["name" => "ส่งต่อ Vendor", "color" => \App\Enums\Colors::PRIMARY],
            ["name" => "รอ Vendor รับเรื่อง", "color" => \App\Enums\Colors::PRIMARY],
            ["name" => "Vendor กำลังซ่อม", "color" => \App\Enums\Colors::WARNING],
            ["name" => "Vendor ซ่อมเสร็จ รอตรวจสอบ", "color" => \App\Enums\Colors::SUCCESS],
            ["name" => "รอผู้ใช้งานยืนยันผล", "color" => \App\Enums\Colors::WARNING],
            ["name" => "ปิดงาน", "color" => \App\Enums\Colors::SUCCESS],
            ["name" => "ยกเลิกคำขอ", "color" => \App\Enums\Colors::DANGER],
        ];

        foreach ($status as $value) {
            \App\Models\ActionStatus::updateOrcreate(["name" => $value["name"]], $value);
        }
    }
}
