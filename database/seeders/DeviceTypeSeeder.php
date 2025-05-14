<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $deviceTypes = [
            ["name" => "Notebook"],
            ["name" => "PC"],
            ["name" => "Printer"],
            ["name" => "Monitor"],
            ["name" => "Other"],
        ];

        foreach ($deviceTypes as $deviceType) {
            \App\Models\DeviceType::updateOrcreate(["name" => $deviceType["name"]], $deviceType);
        }
    }
}
