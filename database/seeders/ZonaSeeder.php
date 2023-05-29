<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ZonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zonas')->insert([
            'id' => '1',
            'nombre' => 'Zona General',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'user_Id' => 1
        ]); 
        DB::table('zonas')->insert([
            'id' => '2',
            'nombre' => 'Monterrey General',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'user_Id' => 1
        ]);    
        DB::table('zonas')->insert([
            'id' => '3',
            'nombre' => 'Saltillo General',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'user_Id' => 1
        ]);    
    }
}
