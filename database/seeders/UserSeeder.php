<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate([
            'name' => 'Super Admin',
            'username' => 'superdamin',
            'email' => 'superadmin@terraforce.app',
            'password' => Hash::make('secret'),
            'role' => User::ROLE_ADMIN,
            'remember_token' => Str::random(10),
        ]);

        User::firstOrCreate([
            'name' => 'Common User',
            'username' => 'commonuser1',
            'email' => 'user@terraforce.app',
            'password' => Hash::make('secret'),
            'role' => User::ROLE_USER,
            'remember_token' => Str::random(10),
        ]);

        User::factory()->count(4)->create();
    }
}
