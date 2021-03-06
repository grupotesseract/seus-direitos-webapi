<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Evento.
 * @version February 27, 2018, 10:06 am BRT
 *
 * @property string nome
 * @property string descricao
 * @property timestamp datahora
 * @property string linkimagem
 */
class Evento extends Model
{
    use SoftDeletes;

    public $table = 'eventos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nome',
        'descricao',
        'datahora',
        'linkimagem',
        'extensao',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'descricao' => 'string',
        'linkimagem' => 'string',
        'extensao' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'descricao' => 'required',
        'datahora' => 'required',
    ];
}
