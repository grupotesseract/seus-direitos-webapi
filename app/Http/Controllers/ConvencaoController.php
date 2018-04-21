<?php

namespace App\Http\Controllers;

use App\DataTables\ConvencaoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateConvencaoRequest;
use App\Http\Requests\UpdateConvencaoRequest;
use App\Repositories\ConvencaoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use App\Models\Categoria as Categoria;

class ConvencaoController extends AppBaseController
{
    /** @var  ConvencaoRepository */
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
        $categorias = Categoria::all()->pluck('nome','id')->toArray();
        return view('convencaos.create')->with('categorias', $categorias);
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
        $arquivo = $request->file('arquivo')->store('arquivos_convencao');

        $input = $request->all();

        $input['arquivo'] = $arquivo;

        $convencao = $this->convencaoRepository->create($input);

        Flash::success('Convenção salva com sucesso.');

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
            Flash::error('Convenção Coletiva não encontrada');

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
            Flash::error('Convenção Coletiva não encontrada');

            return redirect(route('convencaos.index'));
        }

        $categorias = Categoria::all()->pluck('nome','id')->toArray();

        return view('convencaos.edit')->with(['convencao' => $convencao, 'categorias' => $categorias]);
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
            Flash::error('Convenção Coletiva não encontrada');

            return redirect(route('convencaos.index'));
        }

        $convencao = $this->convencaoRepository->update($request->all(), $id);

        Flash::success('Convenção Coletiva salva com sucesso.');

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
            Flash::error('Convenção Coletiva não encontrada');

            return redirect(route('convencaos.index'));
        }

        $this->convencaoRepository->delete($id);

        Flash::success('Convenção Coletiva excluída com sucesso.');

        return redirect(route('convencaos.index'));
    }
}
