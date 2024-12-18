<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_data = [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ];

        $existing_user = User::where('email', $user_data['email'])->exists();

        if (!$existing_user) {
            User::create($user_data);
            $this->command->info('User created successfully!');
        } else {
            $this->command->info('User with email : "'.$user_data['email'].'" already exists.');
        }
    }
}
