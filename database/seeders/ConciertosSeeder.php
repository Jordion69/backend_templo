<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Concierto;
use App\Models\Telonero;

class ConciertosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Ruta al archivo JSON
        $jsonPath = database_path('data/conciertos.json');
        $json = file_get_contents($jsonPath);
        $conciertos = json_decode($json, true);

        foreach ($conciertos as $data) {
            // Crea el concierto
            $concierto = Concierto::create([
                'id' => $data['id'],
                'nombre' => $data['nombre'],
                'imagen' => $data['imagen'],
                'alt_imagen' => $data['alt_imagen'],
                'banda_principal' => $data['banda_principal'],
                'sala' => $data['sala'],
                'direccion' => $data['direccion'],
                'poblacion' => $data['poblacion'],
                'provincia' => $data['provincia'],
                'fecha_evento' => $data['fecha_evento'],
                'link_entrada' => $data['link_entrada'],
                'created_at' => $data['created_at'],
                'updated_at' => $data['updated_at'],

            ]);

            // Crea los teloneros asociados, si existen
            if (array_key_exists('teloneros', $data)) {
                foreach ($data['teloneros'] as $teloneroData) {
                    Telonero::create([
                        'concierto_id' => $concierto->id,
                        'telonero' => $teloneroData['telonero'],
                        'created_at' => $teloneroData['created_at'],
                        'updated_at' => $teloneroData['updated_at'],
                        // ... otros campos del telonero si los hay ...
                    ]);
                }
            }
        }
            // Aquí también puedes manejar la creación de teloneros si están incluidos en tu JSON
    }
}
