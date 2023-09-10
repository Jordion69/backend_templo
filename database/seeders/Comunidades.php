<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Comunidades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comunidades_autonomas')->delete();

        DB::table('comunidades_autonomas')->insert([
            ['comunidad' => "Andalucía"],
            ['comunidad' => "Aragón"],
            ['comunidad' => "Asturias, Principado de"],
            ['comunidad' => "Baleares, Islas"],
            ['comunidad' => "Canarias"],
            ['comunidad' => "Cantabria"],
            ['comunidad' => "Castilla y León"],
            ['comunidad' => "Castilla - La Mancha"],
            ['comunidad' => "Cataluña"],
            ['comunidad' => "Comunidad Valenciana"],
            ['comunidad' => "Extramadura"],
            ['comunidad' => "Galicia"],
            ['comunidad' => "Madrid, Comunidad de"],
            ['comunidad' => "Murcia, Región de"],
            ['comunidad' => "Navarra, Comunidad Foral de"],
            ['comunidad' => "País Vasco"],
            ['comunidad' => "Rioja, La"],
            ['comunidad' => "Ceuta"],
            ['comunidad' => "Melilla"]
        ]);
    }
}
