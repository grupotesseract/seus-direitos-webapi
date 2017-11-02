<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFilmeRequest;
use App\Http\Requests\UpdateFilmeRequest;
use App\Repositories\FilmeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FilmeController extends AppBaseController
{
    /** @var  FilmeRepository */
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
        $input = $request->all();

        $filme = $this->filmeRepository->create($input);

        Flash::success('Filme saved successfully.');

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
            Flash::error('Filme not found');

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
            Flash::error('Filme not found');

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
            Flash::error('Filme not found');

            return redirect(route('filmes.index'));
        }

        $filme = $this->filmeRepository->update($request->all(), $id);

        Flash::success('Filme updated successfully.');

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
            Flash::error('Filme not found');

            return redirect(route('filmes.index'));
        }

        $this->filmeRepository->delete($id);

        Flash::success('Filme deleted successfully.');

        return redirect(route('filmes.index'));
    }
}
