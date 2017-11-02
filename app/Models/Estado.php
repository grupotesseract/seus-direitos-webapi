<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Estado.
 * @version October 30, 2017, 8:13 pm BRST
 */
class Estado extends Model
{
    public $table = 'estados';

    protected $dates = ['created_at', 'updated_at'];

    public $fillable = [
        'nome',
        'sigla',
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
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cidades()
    {
        return $this->hasMany(\App\Models\Cidade::class);
    }
}
