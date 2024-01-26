<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeloneroConciertoPasado extends Model
{
    use HasFactory;
    protected $table = 'teloneros_conciertos_pasados';

    protected $fillable = [
        'concierto_pasado_id',
        'telonero'
    ];

    public function concierto()
    {
        return $this->belongsTo('App\Models\ConciertosPasados', 'concierto_pasado_id');
    }
}
