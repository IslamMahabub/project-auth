<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create User Role
        $user_role = Role::create(['name' => 'User']);
        $user_permissions= ['profile-list', 'profile-create', 'profile-edit'];
        $user_permissions= Permission::whereIn('name',$user_permissions)->get();
        $user_role->syncPermissions($user_permissions);
    }
}
