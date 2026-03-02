<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'manage-blog', 'display_name' => 'Manage Blog', 'description' => 'Can manage blog'],
            ['name' => 'create-blog', 'display_name' => 'Create Blog', 'description' => 'Can create blog'],
            ['name' => 'edit-blog', 'display_name' => 'Edit Blog', 'description' => 'Can edit blog'],
            ['name' => 'delete-blog', 'display_name' => 'Delete Blog', 'description' => 'Can delete blog'],
            ['name' => 'view-blog', 'display_name' => 'View Blog', 'description' => 'Can view blog'],

            ['name' => 'manage-employees', 'display_name' => 'manage employees', 'description' => 'Can manage employees'],
            ['name' => 'create-employees', 'display_name' => 'create employees', 'description' => 'Can create employees'],
            ['name' => 'edit-employees', 'display_name' => 'edit employees', 'description' => 'Can edit employees'],
            ['name' => 'delete-employees', 'display_name' => 'delete employees', 'description' => 'Can delete employees'],
            ['name' => 'view-employees', 'display_name' => 'View employees', 'description' => 'Can view employees'],

            ['name' => 'manage-roles', 'display_name' => 'Manage roles', 'description' => 'Can manage roles'],
            ['name' => 'create-roles', 'display_name' => 'Create roles', 'description' => 'Can create roles'],
            ['name' => 'edit-roles', 'display_name' => 'Edit roles', 'description' => 'Can edit roles'],
            ['name' => 'delete-roles', 'display_name' => 'Delete roles', 'description' => 'Can delete roles'],
            ['name' => 'view-roles', 'display_name' => 'View roles', 'description' => 'Can view roles'],

            ['name' => 'manage-service', 'display_name' => 'Manage service', 'description' => 'Can manage service'],
            ['name' => 'create-service', 'display_name' => 'Create service', 'description' => 'Can create service'],
            ['name' => 'edit-service', 'display_name' => 'Edit service', 'description' => 'Can edit service'],
            ['name' => 'delete-service', 'display_name' => 'Delete service', 'description' => 'Can delete service'],
            ['name' => 'view-service', 'display_name' => 'View service', 'description' => 'Can view service'],

            ['name' => 'manage-staff', 'display_name' => 'Manage staff', 'description' => 'Can manage staff'],

            ['name' => 'manage-appointment', 'display_name' => 'Manage appointment', 'description' => 'Can manage appointment'],
            ['name' => 'create-appointment', 'display_name' => 'Create appointment', 'description' => 'Can create appointment'],
            ['name' => 'edit-appointment', 'display_name' => 'Edit appointment', 'description' => 'Can edit appointment'],
            ['name' => 'delete-appointment', 'display_name' => 'Delete appointment', 'description' => 'Can delete appointment'],
            ['name' => 'view-appointment', 'display_name' => 'View appointment', 'description' => 'Can view appointment'],

            ['name' => 'manage-setting', 'display_name' => 'Manage setting', 'description' => 'Can manage setting'],
            ['name' => 'manage-email-setting', 'display_name' => 'Manage email setting', 'description' => 'Can manage email setting'],
            ['name' => 'manage-stripe-setting', 'display_name' => 'Manage stripe-setting', 'description' => 'Can manage stripe-setting'],

            ['name' => 'manage-plan', 'display_name' => 'Manage plan', 'description' => 'Can manage plan'],
            ['name' => 'create-plan', 'display_name' => 'Create plan', 'description' => 'Can create plan'],
            ['name' => 'edit-plan', 'display_name' => 'Edit plan', 'description' => 'Can edit plan'],
            ['name' => 'delete-plan', 'display_name' => 'Delete plan', 'description' => 'Can delete plan'],
            ['name' => 'view-plan', 'display_name' => 'View plan', 'description' => 'Can view plan'],

            ['name' => 'manage-history', 'display_name' => 'manage history', 'description' => 'Can manage history'],
            ['name' => 'manage-sub-manu-plan', 'display_name' => 'manage sub manu', 'description' => 'Can manage sub manu'],
            ['name' => 'manage-plan-subscription', 'display_name' => 'manage plan-subscription', 'description' => 'Can manage plan-subscription'],

        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
