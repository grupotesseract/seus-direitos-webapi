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
        if (\Laratrust::hasRole('sindicalista')) {
            return User::whereRoleIs('funcionario')->where('sindicato_id', \Auth::user()->sindicato_id)->get();
        }

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

    /**
     * Atualiza o user aceitando ou cancelando o aceite de contribuicao
     *
     * @param App\Models\User $user
     */
    public function togglAceiteContribuicao(User $user)
    {
        // Se ja permitir, entao esta cancelando, atualizar data de cancelamento
        if ($user->aceitou_contribuicao) {
            $user->data_cancelou_contribuicao = \Carbon\Carbon::now();
        }

        // Se esta permitindo, remover data cancelamento para garantir :)
        else {
            $user->data_aceitou_contribuicao = \Carbon\Carbon::now();
            $user->data_cancelou_contribuicao = null;
        }

        $user->aceitou_contribuicao = ! $user->aceitou_contribuicao;

        return $user->save();
    }
}
