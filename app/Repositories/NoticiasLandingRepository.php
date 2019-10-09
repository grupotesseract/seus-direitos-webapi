<?php

namespace App\Repositories;

use App\Models\NoticiasLanding;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NoticiasLandingRepository.
 * @version October 8, 2019, 4:18 pm BRT
 *
 * @method NoticiasLanding findWithoutFail($id, $columns = ['*'])
 * @method NoticiasLanding find($id, $columns = ['*'])
 * @method NoticiasLanding first($columns = ['*'])
 */
class NoticiasLandingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'texto',
        'imagem',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return NoticiasLanding::class;
    }
}
