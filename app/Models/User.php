<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, Notifiable;

    public $table = 'users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public $fillable = [
        'name',
        'aceitou_contribuicao',
        'data_aceitou_contribuicao',
        'data_cancelou_contribuicao',
        'email',
        'password',
        'sindicato_id',
        'cidade_id',
        'instituicao_id',
        'rg',
        'celular',
        'matricula',
        'validade_carteirinha'
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'role' => 'required|exists:roles,name',
        'sindicato_id' => 'sometimes|exists:sindicatos,id',
        'instituicao_id' => 'sometimes|exists:instituicoes,id',
        'cidade_id' => 'sometimes|exists:cidades,id',
    ];

    public static $updateRules = [
        'name' => 'required',
        'email' => 'required',
        'role' => 'required|exists:roles,name',
        'sindicato_id' => 'sometimes|exists:sindicatos,id',
        'instituicao_id' => 'sometimes|exists:instituicoes,id',
    ];

    /**
     * Um User pode ser responsavel de um sindicato ou estar associado a um sindicato.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sindicato()
    {
        return $this->belongsTo(\App\Models\Sindicato::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cidade()
    {
        return $this->belongsTo(\App\Models\Cidade::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instituicao()
    {
        return $this->belongsTo(\App\Models\Instituicao::class);
    }

    /**
     * Acessor para o link do logo do sindicato ou um placeholder.
     */
    public function getLinkLogoSindicatoAttribute()
    {
        return $this->sindicato
            ? $this->sindicato->linkLogo
            : 'https://via.placeholder.com/100';
    }

    /**
     * Acessor para o Nome do sindicato ou um texto vazio.
     */
    public function getNomeSindicatoAttribute()
    {
        return $this->sindicato
            ? $this->sindicato->nome
            : '';
    }

    /**
     * Acessor para o nome da instituicao ou um texto vazio.
     */
    public function getNomeInstituicaoAttribute()
    {
        return $this->instituicao
            ? $this->instituicao->nome
            : '';
    }

    /**
     * Acessor para URL final da listagem de acordo com o tipo do User.
     */
    public function getRotaListagemAttribute()
    {
        switch ($this->roles()->first()->name) {
            case 'superadmin':
                return '/usuarios/administradores';
                break;
            case 'sindicalista':
                return '/usuarios/sindicalistas';
                break;
            case 'funcionario':
                return '/usuarios/funcionarios';
                break;
            default:
                break;
        }
    }
}
