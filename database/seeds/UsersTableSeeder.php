<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_user')->truncate();
        //admin
        $userAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => bcrypt('admin')
        ]);

        //managers
        $userManager = User::create([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => bcrypt('manager')
        ]);

        //users
        $users = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => bcrypt('user')
        ]);

        $adminRole = Role::create([
            'name' => 'admin',
            'slug' => 'admin'
        ]);

        $managerRole = Role::create([
            'name' => 'manager',
            'slug' => 'manager'
        ]);

        $userRole = Role::create([
            'name' => 'user',
            'slug' => 'user'
        ]);

        $userAdmin->roles()->attach($adminRole);
        $userManager->roles()->attach($managerRole);
        $users->roles()->attach($userRole);
    }
}
