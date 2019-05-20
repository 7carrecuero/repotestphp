<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'approver';
        $role->description = 'Aprobador';
        $role->save();

        $role = new Role();
        $role->name = 'applicant';
        $role->description = 'Solicitante';
        $role->save();
        
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrador';
        $role->save();
    }
}
