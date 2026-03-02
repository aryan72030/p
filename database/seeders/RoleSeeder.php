<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin', 'display_name' => 'admin', 'description' => 'all view']);

        $adminrole = Role::where('name', 'admin')->first();
        
        $allpermissions = Permission::all();
        if ($adminrole) {
            $adminrole->syncPermissions($allpermissions);
        }
    }
}
