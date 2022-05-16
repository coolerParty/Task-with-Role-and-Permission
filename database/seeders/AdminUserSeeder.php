<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $adminRole = Role::create(['name' => 'Administrator']);
        // $permission = Permission::create(['name' => 'manage tasks']);
        // $permission->assignRole($adminRole);

        $adminUser = User::factory()->create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@admin.com',
            'password' => bcrypt('1234567890')
        ]);
        $adminUser->assignRole('Super Admin');

        $adminUser = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234567890')
        ]);
        $adminUser->assignRole('admin');

        $adminAuthor = User::factory()->create([
            'name' => 'Author',
            'email' => 'author@author.com',
            'password' => bcrypt('1234567890')
        ]);
        $adminAuthor->assignRole('author');

        $adminEditor = User::factory()->create([
            'name' => 'Editor',
            'email' => 'editor@editor.com',
            'password' => bcrypt('1234567890')
        ]);
        $adminEditor->assignRole('editor');

        $adminGuest = User::factory()->create([
            'name' => 'Guest',
            'email' => 'guest@guest.com',
            'password' => bcrypt('1234567890')
        ]);
        $adminGuest->assignRole('guest');
    }
}
