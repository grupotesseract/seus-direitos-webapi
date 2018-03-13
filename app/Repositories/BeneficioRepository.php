<?php

namespace App\Repositories;

use App\Models\Beneficio;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BeneficioRepository
 * @package App\Repositories
 * @version March 13, 2018, 6:27 pm UTC
 *
 * @method Beneficio findWithoutFail($id, $columns = ['*'])
 * @method Beneficio find($id, $columns = ['*'])
 * @method Beneficio first($columns = ['*'])
*/
class BeneficioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sindicato_id',
        'nome'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Beneficio::class;
    }

}
