<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EstatusOrden::class);
        $this->call(RolesSeeder::class);
        $this->call(ZonaSeeder::class);
        $this->call(TiendaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CentroDeServicioSeeder::class);
        $this->call(TipoAplicaionSeeder::class);


    }
}
