<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\Instituicao;
use App\Models\User as User;
use App\DataTables\ConvencaoDataTable;
use App\Models\Sindicato as Sindicato;
use Illuminate\Support\Facades\Storage;
use App\Repositories\ConvencaoRepository;
use App\Http\Requests\CreateConvencaoRequest;
use App\Http\Requests\UpdateConvencaoRequest;
use App\DataTables\Scopes\PorSindicatoDaInstituicao;

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
            ->addScope(new PorSindicatoDaInstituicao(\Auth::user()))
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
        $instituicaos = null;
        $instituicao = null;

        //Se for superadmin mostrar todas instituicoes
        if ($user->hasRole('superadmin')) {
            $instituicaos = Instituicao::all()->pluck('nome', 'id')->toArray();
            $instituicao = null;
        }

        //Se for de um sindicato, mostrar as instituicoes do sindicato apenas
        else {
            $instituicaos = $user->sindicato->instituicoes()->pluck('nome', 'id');
        }

        return view('convencaos.create')->with('instituicaos', $instituicaos);
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

        $arquivo = Storage::putFile('arquivos_convencao', $request->file('arquivo'), 'public');

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

        $user = \Auth::user();
        $instituicaos = null;
        $instituicao = $convencao->instituicao_id;

        //Se for superadmin mostrar todas instituicoes
        if ($user->hasRole('superadmin')) {
            $instituicaos = Instituicao::all()->pluck('nome', 'id')->toArray();
        }

        //Se for de um sindicato, mostrar as instituicoes do sindicato apenas
        else {
            $instituicaos = $user->sindicato->instituicoes()->pluck('nome', 'id');
        }

        return view('convencaos.edit')->with([
            'convencao' => $convencao,
            'instituicao' => $instituicao,
            'instituicaos' => $instituicaos,
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

        $arquivo = $request->file('arquivo')->store('arquivos_convencao');

        $input = $request->all();

        $input['arquivo'] = $arquivo;

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
        $instituicao = User::find($idUsuario)->instituicao;
        $convencoes = $instituicao->convencaos;

        return view('convencaos.indexpublico')->with('convencoes', $convencoes);
    }

    /**
     * Metodo para fazer download do arquivo da Convencao Coletiva.
     *
     * @param mixed $id - ID da Convencao
     */
    public function downloadConvencao($id)
    {
        $convencao = $this->convencaoRepository->findWithoutFail($id);
        $arquivo = storage_path('app/'.$convencao->arquivo);

        return response()->download($arquivo);
    }
}
