<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Provincias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provincias')->delete();

        DB::table('provincias')->insert([
            ['comunidad_autonoma_id' => 8, 'provincia' => 'Albacete'],
            ['comunidad_autonoma_id' => 8, 'provincia' => 'Ciudad Real'],
            ['comunidad_autonoma_id' => 8, 'provincia' => 'Cuenca'],
            ['comunidad_autonoma_id' => 8, 'provincia' => 'Guadalajara'],
            ['comunidad_autonoma_id' => 8, 'provincia' => 'Toledo'],
            ['comunidad_autonoma_id' => 2, 'provincia' => 'Huesca'],
            ['comunidad_autonoma_id' => 2, 'provincia' => 'Teruel'],
            ['comunidad_autonoma_id' => 2, 'provincia' => 'Zaragoza'],
            ['comunidad_autonoma_id' => 18, 'provincia' => 'Ceuta'],
            ['comunidad_autonoma_id' => 13, 'provincia' => 'Madrid'],
            ['comunidad_autonoma_id' => 14, 'provincia' => 'Murcia'],
            ['comunidad_autonoma_id' => 19, 'provincia' => 'Melilla'],
            ['comunidad_autonoma_id' => 15, 'provincia' => 'Navarra'],
            ['comunidad_autonoma_id' => 1, 'provincia' => 'Almería'],
            ['comunidad_autonoma_id' => 1, 'provincia' => 'Cádiz'],
            ['comunidad_autonoma_id' => 1, 'provincia' => 'Córdoba'],
            ['comunidad_autonoma_id' => 1, 'provincia' => 'Granada'],
            ['comunidad_autonoma_id' => 1, 'provincia' => 'Huelva'],
            ['comunidad_autonoma_id' => 1, 'provincia' => 'Jaén'],
            ['comunidad_autonoma_id' => 1, 'provincia' => 'Málaga'],
            ['comunidad_autonoma_id' => 1, 'provincia' => 'Sevilla'],
            ['comunidad_autonoma_id' => 3, 'provincia' => 'Asturias'],
            ['comunidad_autonoma_id' => 6, 'provincia' => 'Cantabria'],
            ['comunidad_autonoma_id' => 7, 'provincia' => 'Ávila'],
            ['comunidad_autonoma_id' => 7, 'provincia' => 'Burgos'],
            ['comunidad_autonoma_id' => 7, 'provincia' => 'León'],
            ['comunidad_autonoma_id' => 7, 'provincia' => 'Palencia'],
            ['comunidad_autonoma_id' => 7, 'provincia' => 'Salamanca'],
            ['comunidad_autonoma_id' => 7, 'provincia' => 'Segovia'],
            ['comunidad_autonoma_id' => 7, 'provincia' => 'Soria'],
            ['comunidad_autonoma_id' => 7, 'provincia' => 'Valladolid'],
            ['comunidad_autonoma_id' => 7, 'provincia' => 'Zamora'],
            ['comunidad_autonoma_id' => 9, 'provincia' => 'Barcelona'],
            ['comunidad_autonoma_id' => 9, 'provincia' => 'Gerona'],
            ['comunidad_autonoma_id' => 9, 'provincia' => 'Lérida'],
            ['comunidad_autonoma_id' => 9, 'provincia' => 'Tarragona'],
            ['comunidad_autonoma_id' => 11, 'provincia' => 'Badajoz'],
            ['comunidad_autonoma_id' => 11, 'provincia' => 'Cáceres'],
            ['comunidad_autonoma_id' => 12, 'provincia' => 'Coruña, La'],
            ['comunidad_autonoma_id' => 12, 'provincia' => 'Lugo'],
            ['comunidad_autonoma_id' => 12, 'provincia' => 'Orense'],
            ['comunidad_autonoma_id' => 12, 'provincia' => 'Pontevedra'],
            ['comunidad_autonoma_id' => 17, 'provincia' => 'Rioja, La'],
            ['comunidad_autonoma_id' => 4, 'provincia' => 'Baleares, Islas'],
            ['comunidad_autonoma_id' => 16, 'provincia' => 'Álava'],
            ['comunidad_autonoma_id' => 16, 'provincia' => 'Guipúzcoa'],
            ['comunidad_autonoma_id' => 16, 'provincia' => 'Vizcaya'],
            ['comunidad_autonoma_id' => 5, 'provincia' => 'Palmas, Las'],
            ['comunidad_autonoma_id' => 5, 'provincia' => 'Tenerife, Santa Cruz De'],
            ['comunidad_autonoma_id' => 10, 'provincia' => 'Alicante'],
            ['comunidad_autonoma_id' => 10, 'provincia' => 'Castellón'],
            ['comunidad_autonoma_id' => 10, 'provincia' => 'Valencia']
        ]);
    }
}
