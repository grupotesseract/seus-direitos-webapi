<?php

namespace App\Repositories;

use App\Models\FaleConosco;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FaleConoscoRepository
 * @package App\Repositories
 * @version August 6, 2018, 11:14 am BRT
 *
 * @method FaleConosco findWithoutFail($id, $columns = ['*'])
 * @method FaleConosco find($id, $columns = ['*'])
 * @method FaleConosco first($columns = ['*'])
*/
class FaleConoscoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'assunto',
        'texto',
        'sindicato_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FaleConosco::class;
    }
}
