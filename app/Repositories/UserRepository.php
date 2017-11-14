<?php

namespace App\Repositories;

use App\Models\User;
use InfyOm\Generator\Common\BaseRepository;

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'remember_token',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return User::class;
    }


    /**
     * Funcao para retornar os usuarios que são super-admins
     */
    public function getUsuariosAdmins()
    {
        return User::whereRoleIs('superadmin')->get();
    }

    /**
     * Funcao para retornar os usuarios que são sindicalistas (admin sindicato)
     */
    public function getUsuariosSindicalistas()
    {
        return User::whereRoleIs('sindicalista')->get();
    }
    
    /**
     * Funcao para retornar os usuarios que são funcionarios (registro via app)
     */
    public function getUsuariosFuncionarios()
    {
        return User::whereRoleIs('funcionario')->get();
    }

}
