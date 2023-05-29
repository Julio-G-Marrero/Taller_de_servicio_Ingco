<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoAplicaionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_applications')->insert([
            'id' => '1',
            'Nombre' => 'Sin Definir',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);  
        DB::table('tipo_applications')->insert([
            'id' => '2',
            'Nombre' => 'Reparacion',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]); 
        DB::table('tipo_applications')->insert([
            'id' => '3',
            'Nombre' => 'Mantenimiento',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]); 
        DB::table('tipo_applications')->insert([
            'id' => '4',
            'Nombre' => 'Garantia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]); 
    }
}
