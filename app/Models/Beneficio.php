<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Beneficio.
 * @version March 13, 2018, 6:27 pm UTC
 *
 * @property \App\Models\Sindicato sindicato
 * @property int sindicato_id
 * @property string nome
 */
class Beneficio extends Model
{
    public $table = 'beneficios';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'sindicato_id',
        'nome',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sindicato_id' => 'integer',
        'nome' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'sindicato_id' => 'required|exists:sindicatos,id',
    ];

    public $hidden = [
       'sindicato_id',
       'created_at',
       'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sindicato()
    {
        return $this->belongsTo(\App\Models\Sindicato::class);
    }
}
