<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        if (User::where('is_admin', true)->exists()) {
            return;
        }

        User::create([
            'name' => 'Admin',
            'email' => 'nutriHealth@gmail.com',
            'password' => Hash::make('nutri1He'), 
            'is_admin' => true,
        ]);
    }
}
