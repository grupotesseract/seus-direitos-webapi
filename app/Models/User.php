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
        'email',
        'password',
        'sindicato_id',
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
}
