<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => env("ADMIN_USERNAME"),
            'email' => env("ADMIN_EMAIL")
        ], [
            'first_name' => env("ADMIN_FIRST_NAME"),
            'last_name' => env("ADMIN_LAST_NAME"),
            'password' => Hash::make(env('USER_PASSWORD')),
            'avatar' => "avatars/bear.png",
            'rule' => \App\Enums\Rules::Admin,
        ]);

        User::updateOrcreate([
            'name' => "user001",
            'email' => 'user001@local'
        ], [
            'first_name' => "User",
            'last_name' => "001",
            'password' => Hash::make(env('USER_PASSWORD')),
            'avatar' => "avatars/beaver.png",
            'rule' => \App\Enums\Rules::User,
        ]);

        User::updateOrcreate([
            'name' => "user002",
            'email' => 'user002@local'
        ], [
            'first_name' => "User",
            'last_name' => "002",
            'password' => Hash::make(env('USER_PASSWORD')),
            'avatar' => "avatars/dog.png",
            'rule' => \App\Enums\Rules::User,
        ]);

        User::updateOrcreate([
            'name' => "emp001",
            'email' => 'emp001@local'
        ], [
            'first_name' => "Employee",
            'last_name' => "001",
            'password' => Hash::make(env('USER_PASSWORD')),
            'avatar' => "avatars/dog.png",
            'rule' => \App\Enums\Rules::Employee,
        ]);

        User::updateOrcreate([
            'name' => "emp002",
            'email' => 'emp002@local'
        ], [
            'first_name' => "Employee",
            'last_name' => "002",
            'password' => Hash::make(env('USER_PASSWORD')),
            'avatar' => "avatars/duck.png",
            'rule' => \App\Enums\Rules::Employee,
        ]);

        User::updateOrcreate([
            'name' => "vendor001",
            'email' => 'vendor001@local'
        ], [
            'first_name' => "Vendor",
            'last_name' => "001",
            'password' => Hash::make(env('USER_PASSWORD')),
            'avatar' => "avatars/frog.png",
            'rule' => \App\Enums\Rules::Vendor,
        ]);

        User::updateOrcreate([
            'name' => "vendor002",
            'email' => 'vendor002@local'
        ], [
            'first_name' => "Vendor",
            'last_name' => "002",
            'password' => Hash::make(env('USER_PASSWORD')),
            'avatar' => "avatars/fox.png",
            'rule' => \App\Enums\Rules::Vendor,
        ]);

        $this->call([
            VendorSeeder::class,
            DeviceTypeSeeder::class,
            DeviceSeeder::class,
            ActionStatusSeeder::class,
        ]);
    }
}
