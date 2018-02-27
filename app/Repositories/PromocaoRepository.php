<?php

namespace App\Repositories;

use App\Models\Promocao;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PromocaoRepository
 * @package App\Repositories
 * @version February 27, 2018, 10:11 am BRT
 *
 * @method Promocao findWithoutFail($id, $columns = ['*'])
 * @method Promocao find($id, $columns = ['*'])
 * @method Promocao first($columns = ['*'])
*/
class PromocaoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'descricao',
        'loja',
        'observacao'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Promocao::class;
    }
}
