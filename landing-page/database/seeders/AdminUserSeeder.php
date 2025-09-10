<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
  
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@local.test',
            'password' => Hash::make('senha123'),
            'is_admin' => true,
        ]);
    }
}