<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaritoDeleted extends Model
{
    use HasFactory;
    protected $table = 'garitos_deleted';
    protected $fillable = ['nombre_garito','nombre_duenyo','direccion','poblacion','provincia','codigo_postal','comunidad_autonoma','telefono','telefono2','facebook','instagram','mail','frase','sentence','visitado','ratio_colaboracion','imagen','alt_imagen','latitud','longitud','tendencia'];
}
