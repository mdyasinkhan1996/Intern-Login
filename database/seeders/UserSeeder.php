<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'super admin', 'roll' => 1, 'email' => 'superadmin@gmail.com', 'password' => 'password'],
            ['name' => 'admin', 'roll' => 2, 'email' => 'admin@gmail.com', 'password' => 'password'],
            ['name' => 'user', 'roll' => 3, 'email' => 'user@gmail.com', 'password' => 'password'],
        ];

        foreach ($items as $item) {
            User::create($item);
        }
    }
}
