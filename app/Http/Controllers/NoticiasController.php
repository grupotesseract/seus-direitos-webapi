<?php

namespace App\Http\Controllers;

use Flash;
use Cloudder;
use Response;
use App\DataTables\NoticiasDataTable;
use App\Models\Sindicato as Sindicato;
use App\DataTables\Scopes\PorSindicato;
use App\Repositories\NoticiasRepository;
use App\Http\Requests\CreateNoticiasRequest;
use App\Http\Requests\UpdateNoticiasRequest;

class NoticiasController extends AppBaseController
{
    /** @var NoticiasRepository */
    private $noticiasRepository;

    public function __construct(NoticiasRepository $noticiasRepo)
    {
        $this->noticiasRepository = $noticiasRepo;
    }

    /**
     * Display a listing of the Noticias.
     *
     * @param NoticiasDataTable $noticiasDataTable
     * @return Response
     */
    public function index(NoticiasDataTable $noticiasDataTable)
    {
        return $noticiasDataTable
            ->addScope(new PorSindicato(\Auth::user()))
            ->render('noticias.index');
    }

    /**
     * Show the form for creating a new Noticias.
     *
     * @return Response
     */
    public function create()
    {
        
        $user = \Auth::user();

        if ($user->hasRole('superadmin')) {
            $sindicatos = Sindicato::all()->pluck('nome', 'id')->toArray();
        }
        //Se for de um sindicato, mostrar o sindicato apenas
        else {
            $sindicatos = $user->sindicato()->pluck('nome', 'id');            
        }              

        return view('noticias.create')->with('sindicatos', $sindicatos);
    }

    /**
     * Store a newly created Noticias in storage.
     *
     * @param CreateNoticiasRequest $request
     *
     * @return Response
     */
    public function store(CreateNoticiasRequest $request)
    {
        $cloud = Cloudder::upload($request->file('thumbnail')->path());

        $extensao = $request->file('thumbnail')->extension();
        $publicId = Cloudder::getPublicId();

        $request->request->add(['thumbnailid' => $publicId, 'extensao' => $extensao]);

        $input = $request->all();

        $noticias = $this->noticiasRepository->create($input);

        Flash::success('Noticia salva com sucesso.');

        return redirect(route('noticias.index'));
    }

    /**
     * Display the specified Noticias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $noticias = $this->noticiasRepository->findWithoutFail($id);

        if (empty($noticias)) {
            Flash::error('Notícia não encontrada');

            return redirect(route('noticias.index'));
        }

        return view('noticias.show')->with('noticias', $noticias);
    }

    /**
     * Show the form for editing the specified Noticias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $noticias = $this->noticiasRepository->findWithoutFail($id);

        if (empty($noticias)) {
            Flash::error('Notícia não encontrada');

            return redirect(route('noticias.index'));
        }

        $sindicatos = Sindicato::all()->pluck('nome', 'id')->toArray();

        return view('noticias.edit')->with(['noticias' => $noticias, 'sindicatos' => $sindicatos]);
    }

    /**
     * Update the specified Noticias in storage.
     *
     * @param  int              $id
     * @param UpdateNoticiasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNoticiasRequest $request)
    {
        $noticias = $this->noticiasRepository->findWithoutFail($id);

        if (empty($noticias)) {
            Flash::error('Notícia não encontrada');

            return redirect(route('noticias.index'));
        }

        $cloud = Cloudder::upload($request->file('thumbnail')->path());

        $extensao = $request->file('thumbnail')->extension();
        $publicId = Cloudder::getPublicId();

        $request->request->add(['thumbnailid' => $publicId, 'extensao' => $extensao]);

        $noticias = $this->noticiasRepository->update($request->all(), $id);

        Flash::success('Noticia atualizada com sucesso.');

        return redirect(route('noticias.index'));
    }

    /**
     * Remove the specified Noticias from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $noticias = $this->noticiasRepository->findWithoutFail($id);

        if (empty($noticias)) {
            Flash::error('Notícia não encontrada');

            return redirect(route('noticias.index'));
        }

        $this->noticiasRepository->delete($id);

        Flash::success('Noticias excluída com sucesso.');

        return redirect(route('noticias.index'));
    }

    public function getNoticiasPorSindicato($idSindicato)
    {
        $noticias = Sindicato::find($idSindicato)->noticias;

        return view('noticias.indexpublico')->with('noticias', $noticias);
    }

    public function detalhaNoticia($id)
    {
        $noticia = $this->noticiasRepository->findWithoutFail($id);

        return view('noticias.detalhapublico')->with('noticia', $noticia);
    }
}
