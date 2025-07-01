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
        User::create([
            'first_name' => 'super',
            'last_name' => 'admin',
            'email' => 'super@gmail.com',
            'phone' => '0912345678',
            'national_number' => '12345678',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'),
            'remember_token' => \Illuminate\Support\Str::random(10)
        ])->assignRole('super-admin');
        $users = User::factory()->count(20)->create();
        foreach ($users as $user) {
            $user->assignRole('user');
        }
    }
}
