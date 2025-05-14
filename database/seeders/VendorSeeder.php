<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendors = [
            [
                "user_id" => "vendor001",
                "name" => "Vendor Company 001",
                "email" => "vendor001@local",
                "phone_no" => "02582145",
            ],
            [
                "user_id" => "vendor002",
                "name" => "Vendor Company 002",
                "email" => "vendor002@local",
                "phone_no" => "025459852",
            ]
        ];

        foreach ($vendors as $vendor) {
            $user = \App\Models\User::where("name", $vendor["user_id"])->first();
            $vendor["user_id"] = $user->id;
            \App\Models\Vendor::updateOrcreate([
                "user_id" => $user->id,
                "name" => $vendor["name"],
            ], $vendor);
        }
    }
}
