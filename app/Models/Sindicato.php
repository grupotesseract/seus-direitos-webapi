<?php

namespace App\Models;

use Eloquent as Model;
use App\Helpers\DeleteModelHelper;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sindicato.
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
        'nome_responsavel',
        'id_categoria',
        'email',
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
        'nome_responsavel' => 'string',
        'email' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'file' => 'max:5000',
        'nome' => 'required',
        'sigla' => 'required|max:50',
        'email' => 'required|email',
    ];

    /** Array que contem os nomes das nested relations, que devem ser deletadas caso essa entidade seja deletada **/
    public $relacoesDependentes = [
        'logo',
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
     * Um Sindicato sempre pertence a uma categoria.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class, 'id_categoria');
    }

    /**
     * Um Sindicato pode estar presente em varias cidades.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cidades()
    {
        return $this->belongsToMany(\App\Models\Cidade::class);
    }

    /**
     * Um Sindicato pode possuir varios responsaveis (administradores).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function responsaveis()
    {
        return $this->hasMany(\App\Models\User::class);
    }

    /**
     * Um Sindicato pode possuir varios associados.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     **/
    public function associados()
    {
        return $this->hasMany(\App\Models\User::class);
    }

    /**
     * Um Sindicato pode possuir varios beneficios.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     **/
    public function beneficios()
    {
        return $this->hasMany(\App\Models\Beneficio::class);
    }

    /**
     * Um Sindicato pode possuir varias noticias.
     */
    public function noticias()
    {
        return $this->hasMany(\App\Models\Noticias::class);
    }

    /**
     * Um Sindicato pode possuir varias instituicoes.
     */
    public function instituicoes()
    {
        return $this->hasMany(\App\Models\Instituicao::class);
    }

    /**
     * Cada sindicato possuí um 1 unica Foto de Logo.
     *
     * @return void
     */
    public function logo()
    {
        return $this->morphOne(\App\Models\Foto::class, 'owner');
    }

    /**
     * Definindo um acessor para a URL da foto no cloudinary no tamanho certo que irão aparecer 200x200.
     */
    public function getLinkLogoAttribute()
    {
        if ($this->logo) {
            return '//res.cloudinary.com/'
                .env('CLOUDINARY_CLOUD_NAME')
                .'/image/upload/c_scale,h_200,w_200,q_auto/'
                .$this->logo->cloudinary_id
                .'.jpg';
        }

        return '//via.placeholder.com/200x200';
    }
}
