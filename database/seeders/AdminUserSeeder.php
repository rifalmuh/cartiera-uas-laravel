<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@cartiera.id'],
            [
                'name' => 'Administrator Cartiera',
                'password' => Hash::make('Cartiera123!'),
            ]
        );
    }
}
