<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class add_roles_and_permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $view_user_list = Permission::create([
            'name' => 'view_user_list'
        ]);
        $view_user = Permission::create([
            'name' => 'view_user'
        ]);
        $edit_user = Permission::create([
            'name' => 'update_user' 
        ]);
        $delete_user = Permission::create([
            'name' => 'delete_user'
        ]);

        /**
         * No need permissions
         * Todo: rename permissions to actions
         */
        $login = Permission::create([
            'name' => 'login'
        ]);

        $register = Permission::create([
            'name' => 'register'
        ]);

        $manager = Role::create([
            'name' => 'manager'
        ]);
        $admin = Role::create([
            'name' => 'admin'
        ]);

        $manager->permissions()->sync([
            $view_user_list->id,
            $view_user->id
        ]);

        $admin->permissions()->sync([
            $view_user->id,
            $view_user_list->id,
            $edit_user->id,
            $delete_user->id
        ]);
    }
}
