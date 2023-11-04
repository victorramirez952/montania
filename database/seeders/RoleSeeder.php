<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Customer']);

        Permission::create(['name' => 'publicHome'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1]);
        // Permission::create(['name' => 'users.update'])->syncRoles([$role1]);
        // Permission::create(['name' => 'users.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'register'])->syncRoles([$role1]);
    }
}
