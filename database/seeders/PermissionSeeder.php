<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        // app()[PermissionRegistrar::class]->forgetCachedPermissions();


        // create permissions
        $permissions = [
            'user-create',
            'user-edit',
            'user-show',
            'user-delete',
            'role-create',
            'role-edit',
            'role-show',
            'role-delete',
            'permission-create',
            'permission-edit',
            'permission-show',
            'permission-delete',
            'task-create',
            'task-edit',
            'task-show',
            'task-delete',

        ];

        foreach($permissions as $permission){
            Permission::create([
                'guard_name' => 'web',
                'name' => $permission
            ]);
        }



        // gets all permissinos via Gate::before rule; see AuthServiceProvider
        Role::create(['name'=>'Super Admin']);



        // Admin Normal Role Start
        $roleAdmin = Role::create(['guard_name' => 'web', 'name' => 'admin']);

        $adminPermissions = [
            'user-create',
            'user-edit',
            'user-show',
            'user-delete',
            'role-create',
            'role-edit',
            'role-show',
            'role-delete',
            'permission-show',
            'task-create',
            'task-edit',
            'task-show',
            'task-delete',
        ];

        foreach($adminPermissions as $permission){
            $roleAdmin->givePermissionTo($permission);
        }
        // Admin Normal Role End



        // Author Role Start {
        $roleAuthor = Role::create(['guard_name' => 'web', 'name' => 'author']);

        $authorPermissions = [
            'task-create',
            'task-edit',
            'task-show',
        ];

        foreach($authorPermissions as $permission){
            $roleAuthor->givePermissionTo($permission);
        }
        // Author Role End }



        // Editor Role Start
        $roleEditor = Role::create(['guard_name' => 'web', 'name' => 'editor']);

        $editorPermissions = [
            'task-edit',
            'task-show',
        ];

        foreach($editorPermissions as $permission){
            $roleEditor->givePermissionTo($permission);
        }
        // Editor Role End

        // guest Role Start
        $roleGuest = Role::create(['guard_name' => 'web', 'name' => 'guest']);

        $guestPermissions = [
            'task-show',
        ];

        foreach($guestPermissions as $permission){
            $roleGuest->givePermissionTo($permission);
        }
        // guest Role End


    }

}
