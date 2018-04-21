<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\DataTables\ConvencaoDataTable;
use App\Repositories\ConvencaoRepository;
use App\Http\Requests\CreateConvencaoRequest;
use App\Http\Requests\UpdateConvencaoRequest;

class ConvencaoController extends AppBaseController
{
    /** @var ConvencaoRepository */
    private $convencaoRepository;

    public function __construct(ConvencaoRepository $convencaoRepo)
    {
        $this->convencaoRepository = $convencaoRepo;
    }

    /**
     * Display a listing of the Convencao.
     *
     * @param ConvencaoDataTable $convencaoDataTable
     * @return Response
     */
    public function index(ConvencaoDataTable $convencaoDataTable)
    {
        return $convencaoDataTable->render('convencaos.index');
    }

    /**
     * Show the form for creating a new Convencao.
     *
     * @return Response
     */
    public function create()
    {
        return view('convencaos.create');
    }

    /**
     * Store a newly created Convencao in storage.
     *
     * @param CreateConvencaoRequest $request
     *
     * @return Response
     */
    public function store(CreateConvencaoRequest $request)
    {
        $input = $request->all();

        $convencao = $this->convencaoRepository->create($input);

        Flash::success('Convencao saved successfully.');

        return redirect(route('convencaos.index'));
    }

    /**
     * Display the specified Convencao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $convencao = $this->convencaoRepository->findWithoutFail($id);

        if (empty($convencao)) {
            Flash::error('Convencao not found');

            return redirect(route('convencaos.index'));
        }

        return view('convencaos.show')->with('convencao', $convencao);
    }

    /**
     * Show the form for editing the specified Convencao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $convencao = $this->convencaoRepository->findWithoutFail($id);

        if (empty($convencao)) {
            Flash::error('Convencao not found');

            return redirect(route('convencaos.index'));
        }

        return view('convencaos.edit')->with('convencao', $convencao);
    }

    /**
     * Update the specified Convencao in storage.
     *
     * @param  int              $id
     * @param UpdateConvencaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConvencaoRequest $request)
    {
        $convencao = $this->convencaoRepository->findWithoutFail($id);

        if (empty($convencao)) {
            Flash::error('Convencao not found');

            return redirect(route('convencaos.index'));
        }

        $convencao = $this->convencaoRepository->update($request->all(), $id);

        Flash::success('Convencao updated successfully.');

        return redirect(route('convencaos.index'));
    }

    /**
     * Remove the specified Convencao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $convencao = $this->convencaoRepository->findWithoutFail($id);

        if (empty($convencao)) {
            Flash::error('Convencao not found');

            return redirect(route('convencaos.index'));
        }

        $this->convencaoRepository->delete($id);

        Flash::success('Convencao deleted successfully.');

        return redirect(route('convencaos.index'));
    }
}
