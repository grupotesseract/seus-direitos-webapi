<?php

namespace App\Http\Controllers;

use App\DataTables\InstituicaoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInstituicaoRequest;
use App\Http\Requests\UpdateInstituicaoRequest;
use App\Repositories\InstituicaoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InstituicaoController extends AppBaseController
{
    /** @var  InstituicaoRepository */
    private $instituicaoRepository;

    public function __construct(InstituicaoRepository $instituicaoRepo)
    {
        $this->instituicaoRepository = $instituicaoRepo;
    }

    /**
     * Display a listing of the Instituicao.
     *
     * @param InstituicaoDataTable $instituicaoDataTable
     * @return Response
     */
    public function index(InstituicaoDataTable $instituicaoDataTable)
    {
        return $instituicaoDataTable->render('instituicaos.index');
    }

    /**
     * Show the form for creating a new Instituicao.
     *
     * @return Response
     */
    public function create()
    {
        return view('instituicaos.create');
    }

    /**
     * Store a newly created Instituicao in storage.
     *
     * @param CreateInstituicaoRequest $request
     *
     * @return Response
     */
    public function store(CreateInstituicaoRequest $request)
    {
        $input = $request->all();

        $instituicao = $this->instituicaoRepository->create($input);

        Flash::success('Instituicao saved successfully.');

        return redirect(route('instituicaos.index'));
    }

    /**
     * Display the specified Instituicao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $instituicao = $this->instituicaoRepository->findWithoutFail($id);

        if (empty($instituicao)) {
            Flash::error('Instituicao not found');

            return redirect(route('instituicaos.index'));
        }

        return view('instituicaos.show')->with('instituicao', $instituicao);
    }

    /**
     * Show the form for editing the specified Instituicao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $instituicao = $this->instituicaoRepository->findWithoutFail($id);

        if (empty($instituicao)) {
            Flash::error('Instituicao not found');

            return redirect(route('instituicaos.index'));
        }

        return view('instituicaos.edit')->with('instituicao', $instituicao);
    }

    /**
     * Update the specified Instituicao in storage.
     *
     * @param  int              $id
     * @param UpdateInstituicaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInstituicaoRequest $request)
    {
        $instituicao = $this->instituicaoRepository->findWithoutFail($id);

        if (empty($instituicao)) {
            Flash::error('Instituicao not found');

            return redirect(route('instituicaos.index'));
        }

        $instituicao = $this->instituicaoRepository->update($request->all(), $id);

        Flash::success('Instituicao updated successfully.');

        return redirect(route('instituicaos.index'));
    }

    /**
     * Remove the specified Instituicao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $instituicao = $this->instituicaoRepository->findWithoutFail($id);

        if (empty($instituicao)) {
            Flash::error('Instituicao not found');

            return redirect(route('instituicaos.index'));
        }

        $this->instituicaoRepository->delete($id);

        Flash::success('Instituicao deleted successfully.');

        return redirect(route('instituicaos.index'));
    }
}
