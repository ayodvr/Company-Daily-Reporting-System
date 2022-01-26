<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissons = [
            [
                'name' => 'user-permission',
                'display_name' => 'User Permission',
                'description' => 'Check'
            ],
            [
                'name' => 'role-permission',
                'display_name' => 'Role Permission',
                'description' => 'Check'
            ],
            [
                'name' => 'create-staffs',
                'display_name' => 'Create Staffs',
                'description' => 'Check'
            ],
            [
                'name' => 'manage-staffs',
                'display_name' => 'Manage Staffs',
                'description' => 'Check'
            ],
            [
                'name' => 'upload-staffs',
                'display_name' => 'Upload Staffs',
                'description' => 'Check'
            ],
            [
                'name' => 'edit-staffs',
                'display_name' => 'Edit Staffs',
                'description' => 'Check'
            ],
            [
                'name' => 'delete-staffs',
                'display_name' => 'Delete Staffs',
                'description' => 'Check'
            ],
            [
                'name' => 'resigned-staffs',
                'display_name' => 'Resigned Staffs',
                'description' => 'Check'
            ],
            [
                'name' => 'terminated-staffs',
                'display_name' => 'Terminated Staffs',
                'description' => 'Check'
            ],
            [
                'name' => 'new-Payroll-batch',
                'display_name' => 'New payroll Batches',
                'description' => 'Check'
            ],
            [
                'name' => 'payroll-bacthes',
                'display_name' => 'Payroll Batches',
                'description' => 'Check'
            ],
            [
                'name' => 'delete-bacthes',
                'display_name' => 'Delete Batches',
                'description' => 'Check'
            ],
            [
                'name' => 'leave-applications',
                'display_name' => 'Leave Applications',
                'description' => 'Check'
            ],
            [
                'name' => 'edit-leave',
                'display_name' => 'Edit Leave',
                'description' => 'Check'
            ],
            [
                'name' => 'delete-leave',
                'display_name' => 'Delete Leave',
                'description' => 'Check'
            ],
            [
                'name' => 'leave-settings',
                'display_name' => 'Leave Settings',
                'description' => 'Check'
            ],
        ];

        foreach ($permissons as $key => $value) {

            $permission = Permission::create([
                'name' => $value['name'],
                'display_name' => $value['display_name'],
                'description' => $value['description']
            ]);
}
    }
}
