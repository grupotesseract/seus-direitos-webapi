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
     * @TODO aplicar a logica que filtra por 'role'
     */
    public function getUsuariosAdmins()
    {
        return $this->all();
    }

    /**
     * Funcao para retornar os usuarios que são sindicalistas (admin sindicato)
     * @TODO aplicar a logica que filtra por 'role'
     */
    public function getUsuariosSindicalistas()
    {
        return $this->all();
    }
    
    /**
     * Funcao para retornar os usuarios que são funcionarios registro via app
     * @TODO aplicar a logica que filtra por 'role'
     */
    public function getUsuariosFuncionarios()
    {
        return $this->all();
    }

}
