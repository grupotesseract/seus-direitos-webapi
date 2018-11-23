<?php

namespace App\Repositories;

use App\Models\Propaganda;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PropagandaRepository
 * @package App\Repositories
 * @version November 23, 2018, 6:36 pm BRST
 *
 * @method Propaganda findWithoutFail($id, $columns = ['*'])
 * @method Propaganda find($id, $columns = ['*'])
 * @method Propaganda first($columns = ['*'])
*/
class PropagandaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Propaganda::class;
    }
}
