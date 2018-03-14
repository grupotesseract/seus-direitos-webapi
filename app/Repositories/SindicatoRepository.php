<?php

namespace App\Repositories;

use App\Models\Sindicato;
use InfyOm\Generator\Common\BaseRepository;
use Illuminate\Database\Eloquent\Builder;

class SindicatoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome' => 'ilike',
        'sigla' => 'ilike',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Sindicato::class;
    }
    

    /**
     * Retorna os campos para um select id => Nome.
     **/
    public function getCamposSelect()
    {
        return Sindicato::pluck('nome', 'id');
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function allFixed($columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();

        if ($this->model instanceof Builder) {
            $results = $this->model->get($columns);
        } else {
            $results = $this->model->all($columns);
        }

        $this->resetModel();
        $this->resetScope();

        return $results;
    }
    
}
