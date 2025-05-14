<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::updateOrcreate([
            'name' => "2974",
            'email' => 'taweechai.yue@yahoo.com'
        ], [
            'first_name' => "Administrator",
            'last_name' => null,
            'password' => null,
            'avatar' => "avatars/bear.png",
            'rule' => \App\Enums\Rules::Admin,
        ]);

        $this->call([
            VendorSeeder::class,
            DeviceTypeSeeder::class,
            DeviceSeeder::class,
            ActionStatusSeeder::class,
        ]);
    }
}
