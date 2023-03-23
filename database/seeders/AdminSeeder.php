<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $user = User::create([
            'name' => 'Admin',
            'email' => 'Admin@theaulabpost.it',
            'password' => Hash::make('12345678'),
            'is_admin' => true,
        ]);
    }
}
