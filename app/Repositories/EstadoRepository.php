<?php

namespace App\Repositories;

use App\Models\Estado;
use InfyOm\Generator\Common\BaseRepository;

class EstadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'sigla',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Estado::class;
    }

    /**
     * Retorna os campos para um select id => Nome.
     **/
    public function getCamposSelect()
    {
        return Estado::pluck('nome', 'id');
    }

    /*
     * Metodo para buscar um Estado por ID ou Sigla.
     *
     * @param int|string $idOuSigla
     */
    public function findByIdOuSigla($idOuSigla)
    {
        $campoQuery = is_numeric($idOuSigla) ? 'id' : 'sigla';

        return $this->findByField($campoQuery, strtoupper($idOuSigla));
    }
}
