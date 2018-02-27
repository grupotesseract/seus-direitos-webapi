<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Promocao.
 * @version February 27, 2018, 10:11 am BRT
 *
 * @property string nome
 * @property string descricao
 * @property string loja
 * @property string observacao
 */
class Promocao extends Model
{
    use SoftDeletes;

    public $table = 'promocoes';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nome',
        'descricao',
        'loja',
        'observacao',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'descricao' => 'string',
        'loja' => 'string',
        'observacao' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'descricao' => 'required',
        'loja' => 'required',
    ];
}
