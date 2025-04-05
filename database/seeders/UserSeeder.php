<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run() {
        User::create([
            'name' => 'Demo User',
            'email' => 'demo@example.com',
            'password' => app('hash')->make('password')
        ]);
    }
}
