<?php

namespace App\Repositories;

use App\Models\Video;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VideoRepository
 * @package App\Repositories
 * @version March 13, 2018, 9:17 pm BRT
 *
 * @method Video findWithoutFail($id, $columns = ['*'])
 * @method Video find($id, $columns = ['*'])
 * @method Video first($columns = ['*'])
*/
class VideoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'destaque',
        'sindicato_id',
        'titulo',
        'descricao',
        'youtube_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Video::class;
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function setVideoDestaque(Video $video)
    {
        $this->limpaVideosDestaque();

        $result = $video->update([
            'destaque' => true
        ]);

        return $result;
    }
    

    /**
     * undocumented function
     *
     * @return void
     */
    public function limpaVideosDestaque()
    {
        return $this->model->where('destaque', true)->update(['destaque' => false]);
    }
    

}
