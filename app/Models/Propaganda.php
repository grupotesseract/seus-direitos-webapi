<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Propaganda.
 * @version November 23, 2018, 6:36 pm BRST
 *
 * @property string nome
 */
class Propaganda extends Model
{
    use SoftDeletes;

    public $table = 'propagandas';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nome',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'file' => 'required|file',
    ];

    /** Array que contem os nomes das nested relations, que devem ser deletadas caso essa entidade seja deletada **/
    public $relacoesDependentes = [
        'foto',
    ];

    /** Array escondendo campos desnecessarios resposta do Eloquent. **/
    public $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'foto',
    ];

    public $appends = [
        'url' => 'url',
    ];

    /**
     * Bindando Model Events para controlar o delete.
     */
    public static function boot()
    {
        parent::boot();

        //Bindando o deleting para remover as relationships dependentes
        static::deleting(function ($model) {
            DeleteModelHelper::deleteRelationships($model);
        });
    }

    /**
     * Cada Propaganda possuí uma Foto.
     *
     * @return void
     */
    public function foto()
    {
        return $this->morphOne(\App\Models\Foto::class, 'owner');
    }

    /**
     * Acessor para a URL da foto.
     */
    public function getURLAttribute()
    {
        return $this->foto ? $this->foto->urlCloudinary : '';
    }
}
