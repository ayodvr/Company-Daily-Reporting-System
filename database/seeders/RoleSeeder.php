<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'Can access all features!'
            ],
            [
                'name' => 'md',
                'display_name' => 'Managing Director',
                'description' => 'Can access all features!'
            ],
            [
                'name' => 'hr',
                'display_name' => 'Human Resources',
                'description' => 'Can access all features!'
            ],
            [
                'name' => 'finance',
                'display_name' => 'Finance',
                'description' => 'Can access limited features!'
            ],
            [
                'name' => 'gm',
                'display_name' => 'General Manager',
                'description' => 'Can access limited features!'
            ],
            [
                'name' => 'staff',
                'display_name' => 'Staff',
                'description' => 'Can access limited features!'
            ],
        ];

        foreach ($roles as $key => $value) {
            $role = Role::create([
                'name' => $value['name'],
                'display_name' => $value['display_name'],
                'description' => $value['description']
            ]);

            // User::first()->attachRole($role);
        }
    }
}
