<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Concierto
 *
 * @property $id
 * @property $nombre
 * @property $banda_principal
 * @property $sala
 * @property $direccion
 * @property $poblacion
 * @property $provincia
 * @property $link_entrada
 * @property $fecha_evento
 * @property $created_at
 * @property $updated_at
 *
 * @property Telonero[] $teloneros
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Concierto extends Model
{
    static $rules = [
		'nombre' => 'required',
		'banda_principal' => 'required',
		'sala' => 'required',
		'direccion' => 'required',
		'poblacion' => 'required',
		'provincia' => 'required',
		'fecha_evento' => 'required',
        'datos_licencia' => 'required|string/max:255'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'banda_principal',
        'sala',
        'direccion',
        'poblacion',
        'provincia',
        'link_entrada',
        'fecha_evento',
        'imagen',
        'image_hash',
        'datos_licencia'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teloneros()
    {
        return $this->hasMany('App\Models\Telonero', 'concierto_id', 'id');
    }
}
