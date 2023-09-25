<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Provincia
 *
 * @property $id
 * @property $comunidad_autonoma_id
 * @property $provincia
 * @property $created_at
 * @property $updated_at
 *
 * @property ComunidadesAutonoma $comunidadesAutonoma
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Provincia extends Model
{

    static $rules = [
		'comunidad_autonoma_id' => 'required',
		'provincia' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['comunidad_autonoma_id','provincia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function comunidadesAutonoma()
    {
        return $this->hasOne('App\Models\ComunidadesAutonoma', 'id', 'comunidad_autonoma_id');
    }
}
