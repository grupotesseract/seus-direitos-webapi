<?php

namespace App\Repositories;

use App\Models\VideosLanding;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VideosLandingRepository.
 * @version October 8, 2019, 4:23 pm BRT
 *
 * @method VideosLanding findWithoutFail($id, $columns = ['*'])
 * @method VideosLanding find($id, $columns = ['*'])
 * @method VideosLanding first($columns = ['*'])
 */
class VideosLandingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'descricao',
        'codigo_video',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return VideosLanding::class;
    }
}
