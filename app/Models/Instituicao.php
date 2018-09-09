<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Instituicao
 * @package App\Models
 * @version September 9, 2018, 7:00 pm BRT
 *
 * @property string nome
 * @property string nomecompleto
 */
class Instituicao extends Model
{
    use SoftDeletes;

    public $table = 'instituicoes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'nomecompleto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'nomecompleto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'nomecompleto' => 'required'
    ];

    public function funcionarios()
    {
        return $this->hasMany(\App\Models\User::class);
    }

    
}
