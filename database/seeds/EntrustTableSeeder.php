<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EntrustTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->display_name = 'Admin Login';
        $role_admin->description = 'Admin';
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->display_name = 'User Page';
        $role_user->description = 'User';
        $role_user->save();

        $role_user_seller = new Role();
        $role_user_seller->name = 'user-seller';
        $role_user_seller->display_name = 'User Page';
        $role_user_seller->description = 'User';
        $role_user_seller->save();

        $edit_user = new Permission();
        $edit_user->name = 'edit-user';
        $edit_user->display_name = 'Edit Users';
        $edit_user->description = 'edit existing users';
        $edit_user->save();

        $edit_data = new Permission();
        $edit_data->name = 'edit-data';
        $edit_data->display_name = 'Edit data';
        $edit_data->description = 'edit existing Data';
        $edit_data->save();

        $user_default = new Permission();
        $user_default->name = 'user-default';
        $user_default->display_name = 'User Permission';
        $user_default->description = 'default user permission as buyer';
        $user_default->save();

        $user_seller = new Permission();
        $user_seller->name = 'user-seller';
        $user_seller->display_name = 'User Permission For Seller';
        $user_seller->description = 'seller permisssion for user';
        $user_seller->save();

        $role_admin->attachPermissions([$edit_user, $edit_data]);
        $role_user->attachPermissions([$user_default]);
        $role_user_seller->attachPermissions([$user_default, $user_seller]);

        $user = User::create([
            'fullname' => "Nadia R",
            'email' => "nadiaa0409@gmail.com",
            'phone' => "082199482921",
            'password' => Hash::make("password"),
        ]);

        $user->attachRole($role_admin);
        $user->save();
    }
}
