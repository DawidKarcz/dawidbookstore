<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_admin = Role::where('name','admin')->first();
        $role_user = Role::where('name','user')->first();

        $admin = new User();
        $admin->name = 'Dawid Karcz';
        $admin->email = 'admin@bookstore.ie';
        $admin->password = Hash::make('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'John Jones';
        $user->email = 'user@bookstore.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_user);

        //admins
        for($i = 1; $i <= 2; $i++){
        $user = User::factory()->create();
        $user->roles()->attach($role_admin);
        }

        for($i = 1; $i <= 10; $i++){
        $user = User::factory()->create();
        $user->roles()->attach($role_user);
        }
    }
}
