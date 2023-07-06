<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Telonero
 *
 * @property $id
 * @property $concierto_id
 * @property $telonero
 * @property $created_at
 * @property $updated_at
 *
 * @property Concierto $concierto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Telonero extends Model
{

    static $rules = [
		'concierto_id' => 'required',
		'telonero' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['concierto_id','telonero'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function concierto()
    {
        return $this->hasOne('App\Models\Concierto', 'id', 'concierto_id');
    }
}
