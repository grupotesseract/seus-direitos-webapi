<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSindicatoAPIRequest;
use App\Http\Requests\API\UpdateSindicatoAPIRequest;
use App\Models\Sindicato;
use App\Repositories\SindicatoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SindicatoController
 * @package App\Http\Controllers\API
 */

class SindicatoAPIController extends AppBaseController
{
    /** @var  SindicatoRepository */
    private $sindicatoRepository;

    public function __construct(SindicatoRepository $sindicatoRepo)
    {
        $this->sindicatoRepository = $sindicatoRepo;
    }

    /**
     * Display a listing of the Sindicato.
     * GET|HEAD /sindicatos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sindicatoRepository->pushCriteria(new RequestCriteria($request));
        $this->sindicatoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $sindicatos = $this->sindicatoRepository->all();

        return $this->sendResponse($sindicatos->toArray(), 'Sindicatos retrieved successfully');
    }

    /**
     * Store a newly created Sindicato in storage.
     * POST /sindicatos
     *
     * @param CreateSindicatoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSindicatoAPIRequest $request)
    {
        $input = $request->all();

        $sindicatos = $this->sindicatoRepository->create($input);

        return $this->sendResponse($sindicatos->toArray(), 'Sindicato saved successfully');
    }

    /**
     * Display the specified Sindicato.
     * GET|HEAD /sindicatos/{id}
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
     * Update the specified Sindicato in storage.
     * PUT/PATCH /sindicatos/{id}
     *
     * @param  int $id
     * @param UpdateSindicatoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSindicatoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Sindicato $sindicato */
        $sindicato = $this->sindicatoRepository->findWithoutFail($id);

        if (empty($sindicato)) {
            return $this->sendError('Sindicato not found');
        }

        $sindicato = $this->sindicatoRepository->update($input, $id);

        return $this->sendResponse($sindicato->toArray(), 'Sindicato updated successfully');
    }

    /**
     * Remove the specified Sindicato from storage.
     * DELETE /sindicatos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Sindicato $sindicato */
        $sindicato = $this->sindicatoRepository->findWithoutFail($id);

        if (empty($sindicato)) {
            return $this->sendError('Sindicato not found');
        }

        $sindicato->delete();

        return $this->sendResponse($id, 'Sindicato deleted successfully');
    }
}
