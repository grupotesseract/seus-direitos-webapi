<?php

namespace App\Repositories;

use App\Models\Noticias;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NoticiasRepository
 * @package App\Repositories
 * @version April 21, 2018, 7:15 pm BRT
 *
 * @method Noticias findWithoutFail($id, $columns = ['*'])
 * @method Noticias find($id, $columns = ['*'])
 * @method Noticias first($columns = ['*'])
*/
class NoticiasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'manchete',
        'corpo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Noticias::class;
    }
}
