<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sindicato.
 * @version November 1, 2017, 11:18 pm BRST
 */
class Sindicato extends Model
{
    use SoftDeletes;

    public $table = 'sindicatos';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $fillable = [
        'nome',
        'sigla',
        'nome_responsavel',
        'id_categoria',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'sigla' => 'string',
        'nome_responsavel' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * Um Sindicato sempre pertence a uma categoria.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class, 'id_categoria');
    }

    /**
     * Um Sindicato pode estar presente em varias cidades.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cidades()
    {
        return $this->belongsToMany(\App\Models\Cidade::class);
    }

    /**
     * Um Sindicato pode possuir varios responsaveis (administradores).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function responsaveis()
    {
        return $this->hasMany(\App\Models\User::class);
    }

    /**
     * Um Sindicato pode possuir varios associados.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     **/
    public function associados()
    {
        return $this->hasMany(\App\Models\User::class);
    }

    /**
     * Um Sindicato pode possuir varios beneficios.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     **/
    public function beneficios()
    {
        return $this->hasMany(\App\Models\Beneficio::class);
    }
}
