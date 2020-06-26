<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('empresas')->insert([
            "nombreEmpresa" => "buscheck",
            "direccionEmpresa" => "Arturo Sarzoza 595",
            "ciudadEmpresa" => "Coquimbo", 
            "telefonoEmpresa" => "974135263", 
            "correoEmpresa" => "contacto@busCheck.com"
        ]);
    }
}
