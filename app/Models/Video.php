<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Video.
 * @version March 13, 2018, 9:17 pm BRT
 *
 * @property \App\Models\Sindicato sindicato
 * @property bool destaque
 * @property int sindicato_id
 * @property string titulo
 * @property string descricao
 * @property string youtube_id
 */
class Video extends Model
{
    public $table = 'videos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'destaque',
        'sindicato_id',
        'titulo',
        'descricao',
        'youtube_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sindicato_id' => 'integer',
        'titulo' => 'string',
        'descricao' => 'string',
        'youtube_id' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required',
        'descricao' => 'required',
        'youtube_id' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sindicato()
    {
        return $this->belongsTo(\App\Models\Sindicato::class);
    }
}
