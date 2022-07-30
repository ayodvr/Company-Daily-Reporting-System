<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin =  \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'store'=>    'DW Experience Center',
            'verified'=> 1,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);
        $admin->attachRole('admin');

        $admin =  \App\Models\User::create([
            'name' => 'Managing Director',
            'email' => 'md@test.com',
            'store'=>    'DW Experience Center',
            'verified'=> 1,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);
        $admin->attachRole('md');

        $admin =  \App\Models\User::create([
            'name' => 'Human Resources',
            'email' => 'hr@test.com',
            'store'=>    'DW Experience Center',
            'verified'=> 1,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);
        $admin->attachRole('hr');

        $admin =  \App\Models\User::create([
            'name' => 'Finance',
            'email' => 'finance@test.com',
            'store'=>    'DW Experience Center',
            'verified'=> 1,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);
        $admin->attachRole('finance');

        $admin =  \App\Models\User::create([
            'name' => 'General Manager',
            'email' => 'gm@test.com',
            'store'=>    'DW Experience Center',
            'verified'=> 1,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);
        $admin->attachRole('gm');
    }
}
