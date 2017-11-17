<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Cidade.
 * @version October 30, 2017, 8:13 pm BRST
 */
class Cidade extends Model
{
    public $table = 'cidades';

    protected $dates = ['created_at', 'updated_at'];

    public $fillable = [
        'estado_id',
        'nome',
    ];

    /**
     * Array de propriedades que devem ser removidas das respostas do Eloquent.
     *
     * @var array
     */
    public $hidden = [
        'estado_id',
        'created_at',
        'updated_at',
        'pivot',
    ];

    /**
     * Array de propriedades que devem ser inseridas nas respostas do Eloquent.
     *
     * @var array
     */
    public $appends = [
        'sigla_estado',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'estado_id' => 'integer',
        'nome' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estado()
    {
        return $this->belongsTo(\App\Models\Estado::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function sindicatos()
    {
        return $this->belongsToMany(\App\Models\Sindicato::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function pessoas()
    {
        return $this->hasMany(\App\Models\User::class);
    }

    /**
     * Acessor para a sigla do estado a qual essa cidade pertence.
     */
    public function getSiglaEstadoAttribute()
    {
        return $this->estado->sigla;
    }
}
