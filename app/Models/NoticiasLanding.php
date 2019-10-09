<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NoticiasLanding.
 * @version October 8, 2019, 4:18 pm BRT
 *
 * @property string titulo
 * @property string texto
 * @property string imagem
 */
class NoticiasLanding extends Model
{
    use SoftDeletes;

    public $table = 'noticias_landings';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'titulo',
        'texto',
        'imagem',
        'extensao',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string',
        'texto' => 'string',
        'imagem' => 'string',
        'extensao' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required',
        'texto' => 'required',
    ];
}
