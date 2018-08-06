<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FaleConosco
 * @package App\Models
 * @version August 6, 2018, 11:14 am BRT
 *
 * @property string assunto
 * @property string texto
 * @property integer sindicato_id
 */
class FaleConosco extends Model
{
    use SoftDeletes;

    public $table = 'fale_conoscos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'assunto',
        'texto',
        'sindicato_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'assunto' => 'string',
        'texto' => 'string',
        'sindicato_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'assunto' => 'required',
        'texto' => 'required',
        'sindicato_id' => 'required'
    ];

    
}
