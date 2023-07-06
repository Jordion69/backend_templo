<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Noticia
 *
 * @property $id
 * @property $titular_inicial
 * @property $texto_inicial
 * @property $foto_inicio
 * @property $alt_foto_inicio
 * @property $titular
 * @property $texto1
 * @property $texto2
 * @property $texto3
 * @property $texto4
 * @property $link_video
 * @property $headline
 * @property $text1
 * @property $text2
 * @property $text3
 * @property $text4
 * @property $palabras_clave
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Noticia extends Model
{
    static $rules = [
		'titular_inicial' => 'required',
		'texto_inicial' => 'required',
		'foto_inicio' => 'required',
		'alt_foto_inicio' => 'required',
		'titular' => 'required',
		'texto1' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titular_inicial','texto_inicial','foto_inicio','alt_foto_inicio','titular','texto1','texto2','texto3','texto4','link_video','headline','text1','text2','text3','text4','palabras_clave'];
}
