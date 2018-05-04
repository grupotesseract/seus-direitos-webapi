<?php

namespace App\Repositories;

use App\Models\Convencao;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConvencaoRepository.
 * @version April 21, 2018, 3:45 pm BRT
 *
 * @method Convencao findWithoutFail($id, $columns = ['*'])
 * @method Convencao find($id, $columns = ['*'])
 * @method Convencao first($columns = ['*'])
 */
class ConvencaoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'resumo',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Convencao::class;
    }
}
