<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Filme
 * @package App\Models
 * @version November 1, 2017, 11:31 pm BRST
 */
class Filme extends Model
{
    use SoftDeletes;

    public $table = 'filmes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'idade',
        'genero',
        'duracao',
        'descricao',
        'trailer'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'idade' => 'string',
        'genero' => 'string',
        'duracao' => 'string',
        'descricao' => 'string',
        'trailer' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
