<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Noticias
 * @package App\Models
 * @version April 21, 2018, 7:15 pm BRT
 *
 * @property string manchete
 * @property string corpo
 * @property string thumbnail
 * @property integer sindicato_id
 */
class Noticias extends Model
{
    use SoftDeletes;

    public $table = 'noticias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'manchete',
        'corpo',
        'thumbnail',
        'sindicato_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'manchete' => 'string',
        'corpo' => 'string',
        'thumbnail' => 'string',
        'sindicato_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'manchete' => 'required',
        'corpo' => 'required',
        'thumbnail' => 'required'
    ];

    
}
