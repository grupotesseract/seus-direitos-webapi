<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Categoria.
 * @version November 1, 2017, 10:50 pm BRST
 */
class Categoria extends Model
{
    use SoftDeletes;

    public $table = 'categorias';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $fillable = [
        'nome',
        'sindicato_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'sindicato_id' => 'integer',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
    ];

    public function sindicato()
    {
        return $this->belongsTo(\App\Models\Sindicato::class);
    }

    /**
     * Relacao 1xN com App\Models\Convencao
     * Uma instituição pode ter varias convencoes.
     */
    public function convencaos()
    {
        return $this->hasMany(\App\Models\Convencao::class);
    }
}
