<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Concierto;
use App\Models\ConciertoPasado;
use App\Models\TeloneroConciertoPasado;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class MovePastConcerts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'concerts:move-past';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Move past concerts to the past concerts table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Moving past concerts...');

        $pastConcerts = Concierto::where('fecha_evento', '<', Carbon::today())->get();

        foreach ($pastConcerts as $concert) {
            $pastConcertData = [
                'concierto_original_id' => $concert->id,
                'nombre' => $concert->nombre,
                'imagen' => $concert->imagen,
                'alt_imagen' => $concert->alt_imagen,
                'banda_principal' => $concert->banda_principal,
                'sala' => $concert->sala,
                'direccion' => $concert->direccion,
                'poblacion' => $concert->poblacion,
                'provincia' => $concert->provincia,
                'fecha_evento' => $concert->fecha_evento,
                'link_entrada' => $concert->link_entrada,
            ];
            $pastConcert = ConciertoPasado::create($pastConcertData);
            foreach ($concert->teloneros as $telonero) {
                TeloneroConciertoPasado::create([
                    'concierto_pasado_id' => $pastConcert->id,
                    'telonero' => $telonero->telonero
                ]);
            }
            // $existingConcerts = Concierto::where('imagen', $concert->imagen)->get();
            // if ($existingConcerts->isEmpty()) {
            //     $deleted = Storage::delete('public/' . $concert->imagen);
            //     dd($concert->imagen, $deleted);
            // } else {
            //     dd($concert->imagen, $existingConcerts->toArray());
            // }

            if (Storage::disk('public')->exists($concert->imagen)) {
                $deleted = Storage::disk('public')->delete($concert->imagen);
                $this->info("Archivo eliminado: " . $deleted);
            } else {
                $this->error("Archivo no encontrado: " . $concert->imagen);
            }
            $concert->delete();
        }

        $this->info('Past concerts moved successfully.');
    }
}
