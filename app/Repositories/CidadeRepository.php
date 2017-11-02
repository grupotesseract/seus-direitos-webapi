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
        'estado_id',
        'nome',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Cidade::class;
    }
}
