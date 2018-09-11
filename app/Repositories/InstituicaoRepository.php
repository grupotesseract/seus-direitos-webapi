<?php

namespace App\Repositories;

use App\Models\Instituicao;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InstituicaoRepository.
 * @version September 9, 2018, 7:00 pm BRT
 *
 * @method Instituicao findWithoutFail($id, $columns = ['*'])
 * @method Instituicao find($id, $columns = ['*'])
 * @method Instituicao first($columns = ['*'])
 */
class InstituicaoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'nomecompleto',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Instituicao::class;
    }
}
