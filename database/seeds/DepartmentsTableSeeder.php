<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tsDepartamentos = array( 
            1 => 'AMAZONAS', 
            2 => 'ANTIOQUIA', 
            3 => 'ARAUCA', 
            4 => 'ATLANTICO', 
            5 => 'BOLIVAR', 
            6 => 'BOYACA', 
            7 => 'CALDAS', 
            8 => 'CAQUETA', 
            9 => 'CASANARE', 
            10 => 'CAUCA', 
            11 => 'CESAR', 
            12 => 'CHOCO', 
            13 => 'CORDOBA', 
            14 => 'CUNDINAMARCA', 
            15 => 'GUAINIA', 
            16 => 'GUAJIRA', 
            17 => 'GUAVIARE', 
            18 => 'HUILA', 
            19 => 'MAGDALENA', 
            20 => 'META', 
            21 => 'N SANTANDER', 
            22 => 'NARINO', 
            23 => 'PUTUMAYO', 
            24 => 'QUINDIO', 
            25 => 'RISARALDA', 
            26 => 'SAN ANDRES', 
            27 => 'SANTANDER', 
            28 => 'SUCRE', 
            29 => 'TOLIMA', 
            30 => 'VALLE DEL CAUCA', 
            31 => 'VAUPES', 
            32 => 'VICHADA', 
        ); 

        foreach($tsDepartamentos as $key=>$departament){

            DB::table('departments')->insert(['id' => $key, 'dpt_name' => $departament]);

        }

        
    }
}
