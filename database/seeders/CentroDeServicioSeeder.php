<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CentroDeServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('centro_de_servicios')->insert([
            'id' => '1',
            'direccion' => 'General',
            'correo' => 'sin definir',
            'tel' => '00000',
            'ciudad' => 'Sin definir',
            'estado' => 'Sin definir',
            'zona_id' => 1,
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);       
        DB::table('centro_de_servicios')->insert([
            'id' => '2',
            'direccion' => 'Madero Centro MTY',
            'correo' => 'tiendamaderoaingco.com',
            'tel' => '81110146',
            'ciudad' => 'Monterrey',
            'estado' => 'Nuevo Leon',
            'zona_id' => 2,
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);  
        DB::table('centro_de_servicios')->insert([
            'id' => '3',
            'direccion' => 'Saltillo Abasolo 154',
            'correo' => 'tienfaabasoloaingco.com',
            'tel' => '81110146',
            'ciudad' => 'Saltillo',
            'estado' => 'Coahuila',
            'zona_id' => 3,
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);  
    }
}
