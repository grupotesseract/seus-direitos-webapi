<?php

namespace App\Repositories;

use Auth;
use App\Models\Sindicato;
use InfyOm\Generator\Common\BaseRepository;

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
        $user = Auth::user();

        if ($user->hasRole('superadmin')) {
            $sindicatos = Sindicato::pluck('nome', 'id');
        } else {
            $sindicatos = $user->sindicato()->pluck('nome', 'id');
        }

        return $sindicatos;
		}
		
		public function onlyTrashed()
		{
			return $this->model->onlyTrashed();
		}
}
