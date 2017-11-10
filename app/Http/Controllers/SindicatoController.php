<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Repositories\SindicatoRepository;
use App\Http\Requests\CreateSindicatoRequest;
use App\Http\Requests\UpdateSindicatoRequest;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * @resource Sindicato
 *
 * Sindicato routes
 */
class SindicatoController extends AppBaseController
{
    /** @var SindicatoRepository */
    private $sindicatoRepository;

    public function __construct(SindicatoRepository $sindicatoRepo)
    {
        $this->sindicatoRepository = $sindicatoRepo;
    }

    /**
     * Display a listing of the Sindicato.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sindicatoRepository->pushCriteria(new RequestCriteria($request));
        $sindicatos = $this->sindicatoRepository->all();

        return view('sindicatos.index')
            ->with('sindicatos', $sindicatos);
    }

    /**
     * Show the form for creating a new Sindicato.
     *
     * @return Response
     */
    public function create()
    {
        return view('sindicatos.create');
    }

    /**
     * Store a newly created Sindicato in storage.
     *
     * @param CreateSindicatoRequest $request
     *
     * @return Response
     */
    public function store(CreateSindicatoRequest $request)
    {
        $input = $request->all();

        $sindicato = $this->sindicatoRepository->create($input);

        Flash::success('Sindicato saved successfully.');

        return redirect(route('sindicatos.index'));
    }

    /**
     * Display the specified Sindicato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sindicato = $this->sindicatoRepository->findWithoutFail($id);

        if (empty($sindicato)) {
            Flash::error('Sindicato not found');

            return redirect(route('sindicatos.index'));
        }

        return view('sindicatos.show')->with('sindicato', $sindicato);
    }

    /**
     * Show the form for editing the specified Sindicato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sindicato = $this->sindicatoRepository->findWithoutFail($id);

        if (empty($sindicato)) {
            Flash::error('Sindicato not found');

            return redirect(route('sindicatos.index'));
        }

        return view('sindicatos.edit')->with('sindicato', $sindicato);
    }

    /**
     * Update the specified Sindicato in storage.
     *
     * @param  int              $id
     * @param UpdateSindicatoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSindicatoRequest $request)
    {
        $sindicato = $this->sindicatoRepository->findWithoutFail($id);

        if (empty($sindicato)) {
            Flash::error('Sindicato not found');

            return redirect(route('sindicatos.index'));
        }

        $sindicato = $this->sindicatoRepository->update($request->all(), $id);

        Flash::success('Sindicato updated successfully.');

        return redirect(route('sindicatos.index'));
    }

    /**
     * Remove the specified Sindicato from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sindicato = $this->sindicatoRepository->findWithoutFail($id);

        if (empty($sindicato)) {
            Flash::error('Sindicato not found');

            return redirect(route('sindicatos.index'));
        }

        $this->sindicatoRepository->delete($id);

        Flash::success('Sindicato deleted successfully.');

        return redirect(route('sindicatos.index'));
    }
}
