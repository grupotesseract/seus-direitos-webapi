<?php

namespace App\Repositories;

use App\Models\Sindicato;
use InfyOm\Generator\Common\BaseRepository;

class SindicatoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'sigla',
        'nome_responsavel'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Sindicato::class;
    }
}
