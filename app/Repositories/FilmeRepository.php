<?php

namespace App\Repositories;

use App\Models\Filme;
use InfyOm\Generator\Common\BaseRepository;

class FilmeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'idade',
        'genero',
        'duracao',
        'descricao',
        'trailer'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Filme::class;
    }
}
