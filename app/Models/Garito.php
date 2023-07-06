<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Garito
 *
 * @property $id
 * @property $nombre_garito
 * @property $nombre_duenyo
 * @property $direccion
 * @property $poblacion
 * @property $provincia
 * @property $codigo_postal
 * @property $comunidad_autonoma
 * @property $telefono
 * @property $telefono2
 * @property $facebook
 * @property $instagram
 * @property $mail
 * @property $frase
 * @property $sentence
 * @property $visitado
 * @property $ratio_colaboracion
 * @property $imagen
 * @property $alt_imagen
 * @property $latitud
 * @property $longitud
 * @property $tendencia
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Garito extends Model
{
    
    static $rules = [
		'nombre_garito' => 'required',
		'nombre_duenyo' => 'required',
		'direccion' => 'required',
		'poblacion' => 'required',
		'provincia' => 'required',
		'codigo_postal' => 'required',
		'comunidad_autonoma' => 'required',
		'visitado' => 'required',
		'imagen' => 'required',
		'alt_imagen' => 'required',
		'latitud' => 'required',
		'longitud' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_garito','nombre_duenyo','direccion','poblacion','provincia','codigo_postal','comunidad_autonoma','telefono','telefono2','facebook','instagram','mail','frase','sentence','visitado','ratio_colaboracion','imagen','alt_imagen','latitud','longitud','tendencia'];



}
