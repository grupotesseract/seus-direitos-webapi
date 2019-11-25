<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Convencao.
 * @version April 21, 2018, 3:45 pm BRT
 *
 * @property string resumo
 * @property string arquivo
 */
class Convencao extends Model
{
    use SoftDeletes;

    public $table = 'convencaos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'resumo',
        'arquivo',
        'categoria_id',
        'texto',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'resumo' => 'string',
        'arquivo' => 'string',
        'texto' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'resumo' => 'required',
        'texto' => 'required',
        'categoria_id' => 'required',
    ];

    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class);
    }
}
