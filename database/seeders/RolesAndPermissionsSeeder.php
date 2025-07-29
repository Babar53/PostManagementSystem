<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public $permissions = [
//roles
        ['id' =>1, 'name' => 'role_list', 'guard_name' => 'web'],
        ['id' =>2 ,'name' => 'role_create', 'guard_name' => 'web'],
        ['id' =>3 ,'name' => 'role_edit', 'guard_name' => 'web'],
        ['id' =>4 ,'name' => 'role_delete', 'guard_name' => 'web'],

//user
        ['id' =>5, 'name' => 'user_list', 'guard_name' => 'web'],
        ['id' =>6 ,'name' => 'user_create', 'guard_name' => 'web'],
        ['id' =>7 ,'name' => 'user_edit', 'guard_name' => 'web'],
        ['id' =>8 ,'name' => 'user_delete', 'guard_name' => 'web'],

//post
        ['id' =>5, 'name' => 'post_list', 'guard_name' => 'web'],
        ['id' =>6 ,'name' => 'post_create', 'guard_name' => 'web'],
        ['id' =>7 ,'name' => 'post_edit', 'guard_name' => 'web'],
        ['id' =>8 ,'name' => 'post_delete', 'guard_name' => 'web'],

    ];
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => \Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        foreach ($this->permissions as $permission) {
            Permission::create([
                'name' => $permission['name'],
                'guard_name' => $permission['guard_name']
            ]);
        }

        Role::create(['name' => 'admin', 'guard_name' => 'web']);
        Role::create(['name' => 'user', 'guard_name' => 'web']);
        // assign permissions to admin role
        $role = Role::where('name', 'admin')->first();
        foreach ($this->permissions as $permission) {
            $role->givePermissionTo($permission['name']);
        }
        //assign admin role to user
        $user = User::where('email', 'admin@gmail.com')->first();
        $user->assignRole('admin');

        //show message after role and permission created
        $this->command->info('Roles and permissions created successfully.');
    }
}
