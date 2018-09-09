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
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required|unique:users,email',
        'password' => 'required',
        'role' => 'required|exists:roles,name',
        'sindicato_id' => 'sometimes|exists:sindicatos,id',
        'instituicao_id' => 'sometimes|exists:instituicoes,id',
        'cidade_id' => 'sometimes|exists:cidades,id',
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

    public function instituicao()
    {
        return $this->belongsTo(\App\Models\Instituicao::class);
    }
}
