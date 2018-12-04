<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\DataTables\InstituicaoDataTable;
use App\Repositories\SindicatoRepository;
use App\Repositories\InstituicaoRepository;
use App\Http\Requests\CreateInstituicaoRequest;
use App\Http\Requests\UpdateInstituicaoRequest;

class InstituicaoController extends AppBaseController
{
    /** @var InstituicaoRepository */
    private $instituicaoRepository;

    /** @var SindicatoRepository */
    private $sindicatoRepository;

    /**
     * __construct recebendo dependencias necessarias.
     *
     * @param InstituicaoRepository $instituicaoRepo
     * @param SindicatoRepository $sindicatoRepo
     */
    public function __construct(InstituicaoRepository $instituicaoRepo, SindicatoRepository $sindicatoRepo)
    {
        $this->instituicaoRepository = $instituicaoRepo;
        $this->sindicatoRepository = $sindicatoRepo;
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
        $sindicatos = $this->sindicatoRepository->getCamposSelect();

        return view('instituicaos.create')->with('sindicatos', $sindicatos);
    }

    /**
     * Store a newly created Instituição in storage.
     *
     * @param CreateInstituicaoRequest $request
     *
     * @return Response
     */
    public function store(CreateInstituicaoRequest $request)
    {
        $input = $request->all();

        $instituicao = $this->instituicaoRepository->create($input);

        Flash::success('Instituicao salva com sucesso.');
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
            Flash::error('Instituição não encontrada');

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
            Flash::error('Instituição não encontrada');

            return redirect(route('instituicaos.index'));
        }

        $sindicatos = $this->sindicatoRepository->getCamposSelect();

        return view('instituicaos.edit')->with('instituicao', $instituicao)
            ->with('sindicatos', $sindicatos);
    }

    /**
     * Update the specified Instituição in storage.
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
            Flash::error('Instituição não encontrada');

            return redirect(route('instituicaos.index'));
        }

        $instituicao = $this->instituicaoRepository->update($request->all(), $id);

        Flash::success('Instituicao atualizada com sucesso.');
        return redirect(route('instituicaos.index'));
    }

    /**
     * Remove the specified Instituição from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $instituicao = $this->instituicaoRepository->findWithoutFail($id);

        if (empty($instituicao)) {
            Flash::error('Instituição não encontrada');

            return redirect(route('instituicaos.index'));
        }

        $this->instituicaoRepository->delete($id);

        Flash::success('Instituição removida com sucesso.');
        return redirect(route('instituicaos.index'));
    }
}
