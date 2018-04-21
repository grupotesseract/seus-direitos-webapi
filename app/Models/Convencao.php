<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Convencao
 * @package App\Models
 * @version April 21, 2018, 3:45 pm BRT
 *
 * @property string resumo
 * @property string arquivo
 */
class Convencao extends Model
{
    use SoftDeletes;

    public $table = 'convencaos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'resumo',
        'arquivo',
        'categoria_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'resumo' => 'string',
        'arquivo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'resumo' => 'required',
        'arquivo' => 'required'
    ];

    
}