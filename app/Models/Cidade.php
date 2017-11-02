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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function sindicatos()
    {
        return $this->hasMany(\App\Models\Sindicato::class);
    }
}
