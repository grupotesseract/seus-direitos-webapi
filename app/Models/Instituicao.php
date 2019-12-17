<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Instituicao.
 * @version September 9, 2018, 7:00 pm BRT
 *
 * @property string nome
 * @property string nomecompleto
 */
class Instituicao extends Model
{
    use SoftDeletes;

    public $table = 'instituicoes';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nome',
        'nomecompleto',
        'sindicato_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'nomecompleto' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'nomecompleto' => 'required',
        'sindicato_id' => 'required',
    ];

    /**
     * Toda instituicao esta relacionada com 1 sindicato.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sindicato()
    {
        return $this->belongsTo(\App\Models\Sindicato::class);
    }

    /**
     * Relacao 1xN com App\Models\User
     * Uma instituição pode ter varios funcionarios.
     */
    public function funcionarios()
    {
        return $this->hasMany(\App\Models\User::class);
    }
}
