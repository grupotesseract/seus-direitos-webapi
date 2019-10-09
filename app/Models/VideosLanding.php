<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VideosLanding.
 * @version October 8, 2019, 4:23 pm BRT
 *
 * @property string titulo
 * @property string descricao
 * @property string codigo_video
 */
class VideosLanding extends Model
{
    use SoftDeletes;

    public $table = 'videos_landings';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'titulo',
        'descricao',
        'codigo_video',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string',
        'descricao' => 'string',
        'codigo_video' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required',
        'descricao' => 'required',
        'codigo_video' => 'required',
    ];
}
