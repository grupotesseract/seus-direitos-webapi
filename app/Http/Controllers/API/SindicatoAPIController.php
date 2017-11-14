<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Models\Sindicato;
use App\Presenters\SindicatoPresenter;
use App\Repositories\SindicatoRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

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

}
