<?php

namespace App\Repositories;

use App\Models\Cidade;
use InfyOm\Generator\Common\BaseRepository;

class CidadeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome' => 'ilike',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Cidade::class;
    }

    /**
     * Retorna os campos para um select id => Nome.
     **/
    public function getCamposSelect()
    {
        return Cidade::pluck('nome', 'id');
    }
}
