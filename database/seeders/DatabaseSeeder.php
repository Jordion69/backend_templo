<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CreateSuperUserSeeder;
use Database\Seeders\Comunidades;
use Database\Seeders\Provincias;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([CreateSuperUserSeeder::class]);
        $this->call([Comunidades::class]);
        $this->call([Provincias::class]);
    }
}
