<?php

namespace App\Http\Controllers\API;

use Response;
use App\Models\Cidade;
use Illuminate\Http\Request;
use App\Repositories\CidadeRepository;
use App\Http\Controllers\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;

/**
 * Class CidadeController.
 */
class CidadeAPIController extends AppBaseController
{
    /** @var CidadeRepository */
    private $cidadeRepository;

    public function __construct(CidadeRepository $cidadeRepo)
    {
        $this->cidadeRepository = $cidadeRepo;
    }

    /**
     * Display a listing of the Cidade.
     * GET|HEAD /cidades.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cidadeRepository->pushCriteria(new RequestCriteria($request));
        $this->cidadeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cidades = $this->cidadeRepository->all();

        return $this->sendResponse($cidades->toArray(), 'Cidades retrieved successfully');
    }
}
