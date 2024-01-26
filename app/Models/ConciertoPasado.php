<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConciertoPasado extends Model
{
    use HasFactory;
    protected $table = 'conciertos_pasados';

    protected $fillable = [
        'concierto_original_id',
        'nombre',
        'imagen',
        'alt_imagen',
        'banda_principal',
        'sala',
        'direccion',
        'poblacion',
        'provincia',
        'fecha_evento',
        'link_entrada'
    ];
    public function teloneros()
    {
        return $this->hasMany('App\Models\TelonerosConciertosPasados', 'concierto_pasado_id');
    }
}
