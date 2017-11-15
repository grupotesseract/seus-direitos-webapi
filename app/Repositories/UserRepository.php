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
     * Funcao para retornar os usuarios que são superadmins.
     */
    public function getUsuariosAdmins()
    {
        return User::whereRoleIs('superadmin')->get();
    }

    /**
     * Funcao para retornar os usuarios que são sindicalistas (admin sindicato).
     */
    public function getUsuariosSindicalistas()
    {
        return User::whereRoleIs('sindicalista')->get();
    }

    /**
     * Funcao para retornar os usuarios que são funcionarios (registro via app).
     */
    public function getUsuariosFuncionarios()
    {
        return User::whereRoleIs('funcionario')->get();
    }

    /**
     * Metodo para adicionar um Role a partir do seu name.
     *
     * @param $user - User model que vai receber o role
     * @param $role_name - string com o name do role a ser inserido
     */
    public function addRole($user, $role_name)
    {
        $role = \App\Models\Role::where('name', $role_name)->first();

        if ($user && $role) {
            $user->attachRole($role);

            return true;
        }

        return false;
    }
}
