<?php

namespace App\Http\Controllers;

use App\DataTables\NoticiasDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateNoticiasRequest;
use App\Http\Requests\UpdateNoticiasRequest;
use App\Repositories\NoticiasRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class NoticiasController extends AppBaseController
{
    /** @var  NoticiasRepository */
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
        return $noticiasDataTable->render('noticias.index');
    }

    /**
     * Show the form for creating a new Noticias.
     *
     * @return Response
     */
    public function create()
    {
        return view('noticias.create');
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
        $input = $request->all();

        $noticias = $this->noticiasRepository->create($input);

        Flash::success('Noticias saved successfully.');

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
            Flash::error('Noticias not found');

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
            Flash::error('Noticias not found');

            return redirect(route('noticias.index'));
        }

        return view('noticias.edit')->with('noticias', $noticias);
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
            Flash::error('Noticias not found');

            return redirect(route('noticias.index'));
        }

        $noticias = $this->noticiasRepository->update($request->all(), $id);

        Flash::success('Noticias updated successfully.');

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
            Flash::error('Noticias not found');

            return redirect(route('noticias.index'));
        }

        $this->noticiasRepository->delete($id);

        Flash::success('Noticias deleted successfully.');

        return redirect(route('noticias.index'));
    }
}
