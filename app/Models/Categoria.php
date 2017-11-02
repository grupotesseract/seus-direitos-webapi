<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Categoria
 * @package App\Models
 * @version November 1, 2017, 10:50 pm BRST
 */
class Categoria extends Model
{
    use SoftDeletes;

    public $table = 'categorias';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $fillable = [
        'nome'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function sindicatos()
    {
        return $this->hasMany(\App\Models\Sindicato::class);
    }

    
}
