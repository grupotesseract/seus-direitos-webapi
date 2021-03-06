<?php

namespace App\Repositories;

use App\Models\Categoria;
use InfyOm\Generator\Common\BaseRepository;

class CategoriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Categoria::class;
    }

    /**
     * Retorna os campos para um select id => Nome.
     **/
    public function getCamposSelect()
    {
        return Categoria::pluck('nome', 'id');
    }
}
