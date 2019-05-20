<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersSeederTable extends Seeder
{
    public function run()
    {
        $role_applicant = Role::where('name', 'applicant')->first();
        $role_approver = Role::where('name', 'approver')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'User';
        $user->last_name = 'UserOperative';
        $user->email = 'user@example.com';
        $user->password = bcrypt('secret');
        $user->deleted = 0;
        $user->save();
        $user->roles()->attach($role_applicant);

        $user = new User();
        $user->name = 'Approver';
        $user->last_name = 'UserApprover';
        $user->email = 'approver@example.com';
        $user->password = bcrypt('secret');
        $user->deleted = 0;
        $user->save();
        $user->roles()->attach($role_approver);
        
        $user = new User();
        $user->name = 'Admin';
        $user->last_name = 'UserAdmin';
        $user->email = 'phernandez@comforce.co ';
        $user->password = bcrypt('secret');
        $user->deleted = 0;
        $user->save();
        $user->roles()->attach($role_admin);

     }
}
