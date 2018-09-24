<?php

namespace App\Http\Controllers\API;

use Auth;
use Response;
use App\Models\Sindicato;
use Illuminate\Http\Request;
use App\Presenters\SindicatoPresenter;
use App\Repositories\SindicatoRepository;
use App\Http\Controllers\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;

/**
 * @resource Sindicato API
 *
 * Sindicato routes
 */
class SindicatoAPIController extends AppBaseController
{
    /** @var SindicatoRepository */
    private $sindicatoRepository;

    public function __construct(SindicatoRepository $sindicatoRepo)
    {
        $this->sindicatoRepository = $sindicatoRepo;
    }

    /**
     * Display a listing of the Sindicato.
     * GET|HEAD /sindicatos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sindicatoRepository->pushCriteria(new RequestCriteria($request));
        $this->sindicatoRepository->pushCriteria(new LimitOffsetCriteria($request));

        //Settando um Presenter para retornar apenas as informacoes relevantes
        $this->sindicatoRepository->setPresenter(SindicatoPresenter::class);

        $sindicatos = $this->sindicatoRepository->all();
        $sindicatos = array_shift($sindicatos);

        return $this->sendResponse($sindicatos, 'Sindicatos retrieved successfully');
    }

    /**
     * Display the specified Sindicato.
     * GET|HEAD /sindicatos/{id}.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Sindicato $sindicato */
        $sindicato = $this->sindicatoRepository->findWithoutFail($id);

        if (empty($sindicato)) {
            return $this->sendError('Sindicato not found');
        }

        return $this->sendResponse($sindicato->toArray(), 'Sindicato retrieved successfully');
    }

    /**
     * Metodo para retornar os beneficios de um sindicato.
     *
     * @param $id do Sindicato
     */
    public function getBeneficiosPorSindicato($id)
    {
        /** @var Estado $estado */
        $sindicato = $this->sindicatoRepository->find($id);

        if (empty($sindicato)) {
            return $this->sendError('Sindicato não encontrado');
        }

        $user = Auth::user();
        $user_id = isset($user->id) ? $user->id : 0;


        $retorno = $sindicato->beneficios->toArray();
        
        /*$urlBeneficio = ['id' => 0, 'nome' => 'Veja aqui sua Carteria Digital: https://www.seusindicato.com.br/carteirinha/'.$user_id];
        array_push($retorno, $urlBeneficio);*/

        return $this->sendResponse($retorno, 'Beneficios do '.$sindicato->nome.':');
    }
}
