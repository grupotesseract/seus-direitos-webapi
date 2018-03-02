<?php

namespace App\Repositories;

use App\Models\Evento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventoRepository.
 * @version February 27, 2018, 10:06 am BRT
 *
 * @method Evento findWithoutFail($id, $columns = ['*'])
 * @method Evento find($id, $columns = ['*'])
 * @method Evento first($columns = ['*'])
 */
class EventoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'descricao',
        'datahora',
        'linkimagem',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Evento::class;
    }
}
