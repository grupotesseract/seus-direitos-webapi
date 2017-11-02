<?php

namespace App\Http\Controllers\API;

use Response;
use App\Models\Estado;
use Illuminate\Http\Request;
use App\Repositories\EstadoRepository;
use App\Http\Controllers\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;

/**
 * Class EstadoController.
 */
class EstadoAPIController extends AppBaseController
{
    /** @var EstadoRepository */
    private $estadoRepository;

    public function __construct(EstadoRepository $estadoRepo)
    {
        $this->estadoRepository = $estadoRepo;
    }

    /**
     * Display a listing of the Estado.
     * GET|HEAD /estados.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estadoRepository->pushCriteria(new RequestCriteria($request));
        $this->estadoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $estados = $this->estadoRepository->all();

        return $this->sendResponse($estados->toArray(), 'Estados retrieved successfully');
    }

    /**
     * Metodo para retornar as cidades de um estado.
     *
     * @param $id do Estado
     */
    public function getCidadesPorEstado($id)
    {
        /** @var Estado $estado */
        $estado = $this->estadoRepository->findByIdOuSigla($id)->first();

        if (empty($estado)) {
            return $this->sendError('Estado not found');
        }

        return $this->sendResponse($estado->cidades->toArray(), 'Cidades do estado '.$estado->nome.':');
    }
}
