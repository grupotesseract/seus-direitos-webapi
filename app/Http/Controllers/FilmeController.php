<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFilmeRequest;
use App\Http\Requests\UpdateFilmeRequest;
use App\Repositories\FilmeRepository;
use Cloudder;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FilmeController extends AppBaseController
{
    /** @var FilmeRepository */
    private $filmeRepository;

    public function __construct(FilmeRepository $filmeRepo)
    {
        $this->filmeRepository = $filmeRepo;
    }

    /**
     * Display a listing of the Filme.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->filmeRepository->pushCriteria(new RequestCriteria($request));
        $filmes = $this->filmeRepository->all();

        return view('filmes.index')
            ->with('filmes', $filmes);
    }

    /**
     * Display a listing of the Filme - publico.
     *
     * @param Request $request
     * @return Response
     */
    public function indexpublic(Request $request)
    {
        $this->filmeRepository->pushCriteria(new RequestCriteria($request));
        $filmes = $this->filmeRepository->all();

        return view('filmes.indexpublico')
            ->with('filmes', $filmes);
    }

    public function indice()
    {
        return view('filmes.indice');
    }

    /**
     * Show the form for creating a new Filme.
     *
     * @return Response
     */
    public function create()
    {
        return view('filmes.create');
    }

    /**
     * Store a newly created Filme in storage.
     *
     * @param CreateFilmeRequest $request
     *
     * @return Response
     */
    public function store(CreateFilmeRequest $request)
    {
        $cloud = Cloudder::upload($request->file('cartaz')->path());

        $extensao = $request->file('cartaz')->extension();
        $publicId = Cloudder::getPublicId();

        $request->request->add(['linkimagem' => $publicId, 'extensao' => $extensao]);

        $input = $request->all();

        $filme = $this->filmeRepository->create($input);

        Flash::success('Filme salvo com sucesso.');

        return redirect(route('filmes.index'));
    }

    /**
     * Display the specified Filme.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $filme = $this->filmeRepository->findWithoutFail($id);

        if (empty($filme)) {
            Flash::error('Filme não encontrado');

            return redirect(route('filmes.index'));
        }

        return view('filmes.show')->with('filme', $filme);
    }

    /**
     * Show the form for editing the specified Filme.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $filme = $this->filmeRepository->findWithoutFail($id);

        if (empty($filme)) {
            Flash::error('Filme não encontrado');

            return redirect(route('filmes.index'));
        }

        return view('filmes.edit')->with('filme', $filme);
    }

    /**
     * Update the specified Filme in storage.
     *
     * @param  int              $id
     * @param UpdateFilmeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFilmeRequest $request)
    {
        $filme = $this->filmeRepository->findWithoutFail($id);

        if (empty($filme)) {
            Flash::error('Filme não encontrado');

            return redirect(route('filmes.index'));
        }

        if (! is_null($request->file('cartaz'))) {
            $cloud = Cloudder::upload($request->file('cartaz')->path());

            $extensao = $request->file('cartaz')->extension();
            $publicId = Cloudder::getPublicId();

            $request->request->add(['linkimagem' => $publicId, 'extensao' => $extensao]);
        }

        $filme = $this->filmeRepository->update($request->all(), $id);

        Flash::success('Filme atualizado com sucesso.');

        return redirect(route('filmes.index'));
    }

    /**
     * Remove the specified Filme from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $filme = $this->filmeRepository->findWithoutFail($id);

        if (empty($filme)) {
            Flash::error('Filme não encontrado');

            return redirect(route('filmes.index'));
        }

        $this->filmeRepository->delete($id);

        Flash::success('Filme excluido com sucesso.');

        return redirect(route('filmes.index'));
    }
}
