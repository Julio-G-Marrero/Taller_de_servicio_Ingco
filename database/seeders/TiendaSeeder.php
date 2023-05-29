<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TiendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tiendas')->insert([
            'id' => '1',
            'tienda' => 'Sin definir',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'zona_id' => '1'
        ]); 
        DB::table('tiendas')->insert([
            'id' => '2',
            'tienda' => 'Tienda Madero',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'zona_id' => '2'
        ]);      
        DB::table('tiendas')->insert([
            'id' => '3',
            'tienda' => 'Tienda Abasolo',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'zona_id' => '3'
        ]);      
    }
}
