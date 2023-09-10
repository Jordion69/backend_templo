<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ComunidadesAutonoma
 *
 * @property $id
 * @property $comunidad
 * @property $created_at
 * @property $updated_at
 *
 * @property Provincia[] $provincias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ComunidadesAutonoma extends Model
{
    
    static $rules = [
		'comunidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['comunidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function provincias()
    {
        return $this->hasMany('App\Models\Provincia', 'comunidad_autonoma_id', 'id');
    }
    

}
