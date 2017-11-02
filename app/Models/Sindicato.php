<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sindicato
 * @package App\Models
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
        'nome_responsavel'
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
        'nome_responsavel' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * Um Sindicato sempre pertence a uma categoria
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class);
    }

    /**
     * Um Sindicato sempre está associado a uma cidade
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cidade()
    {
        return $this->belongsTo(\App\Models\Cidade::class);
    }
    
    
}