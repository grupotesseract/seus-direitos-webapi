<?php

namespace App\Http\Controllers;

use App\DataTables\ConvencaoDataTable;
use App\DataTables\Scopes\PorCategoriasdoSindicato;
use App\Http\Requests\CreateConvencaoRequest;
use App\Http\Requests\UpdateConvencaoRequest;
use App\Models\Categoria;
use App\Models\Sindicato as Sindicato;
use App\Models\User as User;
use App\Repositories\ConvencaoRepository;
use Flash;
use Illuminate\Support\Facades\Storage;
use Response;

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
        return $convencaoDataTable
            ->addScope(new PorCategoriasdoSindicato(\Auth::user()))
            ->render('convencaos.index');
    }

    /**
     * Show the form for creating a new Convencao.
     *
     * @return Response
     */
    public function create()
    {
        $user = \Auth::user();
        $categorias = null;

        //Se for superadmin mostrar todas instituicoes
        if ($user->hasRole('superadmin')) {
            $categorias = Categoria::all()->pluck('nome', 'id')->toArray();
        }

        //Se for de um sindicato, mostrar as instituicoes do sindicato apenas
        else {
            $categorias = $user->sindicato->categorias()->pluck('nome', 'id');
        }

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
        //$arquivo = $request->file('arquivo')->store('arquivos_convencao');

        //$arquivo = Storage::putFile('arquivos_convencao', $request->file('arquivo'), 'public');

        $input = $request->all();

        //$input['arquivo'] = $arquivo;

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

        $user = \Auth::user();
        $categoria = $convencao->categoria_id;

        $categorias = null;

        //Se for superadmin mostrar todas instituicoes
        if ($user->hasRole('superadmin')) {
            $categorias = Categoria::all()->pluck('nome', 'id')->toArray();
        }

        //Se for de um sindicato, mostrar as instituicoes do sindicato apenas
        else {
            $categorias = $user->sindicato->categorias()->pluck('nome', 'id');
        }

        return view('convencaos.edit')->with([
            'convencao' => $convencao,
            'categoria' => $categoria,
            'categorias' => $categorias,
        ]);
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

        //$arquivo = $request->file('arquivo')->store('arquivos_convencao');

        $input = $request->all();

        //$input['arquivo'] = $arquivo;

        $convencao = $this->convencaoRepository->update($input, $id);

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

    /**
     * Metodo para retornar as convencoes por sindicato.
     *
     * @param mixed $idSindicato
     */
    public function getConvencoesPorSindicato($idUsuario)
    {
        $categoria = User::find($idUsuario)->categoria;

        if (! is_null($categoria)) {
            $convencoes = $categoria->convencaos;

            return view('convencaos.indexpublico')->with('convencoes', $convencoes);
        }
    }

    /**
     * Metodo para fazer download do arquivo da Convencao Coletiva.
     *
     * @param mixed $id - ID da Convencao
     */
    public function detalhaConvencao($id)
    {
        $convencao = $this->convencaoRepository->findWithoutFail($id);

        return view('convencaos.detalhapublico')->with('convencao', $convencao);
    }
}
