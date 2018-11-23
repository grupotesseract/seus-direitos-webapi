<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use App\Repositories\FotoRepository;
use App\DataTables\PropagandaDataTable;
use App\Repositories\PropagandaRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreatePropagandaRequest;
use App\Http\Requests\UpdatePropagandaRequest;

class PropagandaController extends AppBaseController
{
    /** @var  PropagandaRepository */
    private $propagandaRepository;

    /** @var  FotoRepository */
    private $fotoRepository;

    /**
     * __construct Recebendo os repositorios necessarios para a logica de propagandas
     *
     * @param PropagandaRepository $propagandaRepo
     * @param FotoRepository $fotoRepo
     */
    public function __construct(PropagandaRepository $propagandaRepo, FotoRepository $fotoRepo)
    {
        $this->propagandaRepository = $propagandaRepo;
        $this->fotoRepository = $fotoRepo;
    }

    /**
     * Display a listing of the Propaganda.
     *
     * @param PropagandaDataTable $propagandaDataTable
     * @return Response
     */
    public function index(PropagandaDataTable $propagandaDataTable)
    {
        return $propagandaDataTable->render('propagandas.index');
    }

    /**
     * Show the form for creating a new Propaganda.
     *
     * @return Response
     */
    public function create()
    {
        return view('propagandas.create');
    }

    /**
     * Store a newly created Propaganda in storage.
     *
     * @param CreatePropagandaRequest $request
     *
     * @return Response
     */
    public function store(CreatePropagandaRequest $request)
    {
        $input = $request->all();

        $propaganda = $this->propagandaRepository->create($input);

        /* Se houver um file na request, entao, salvar a foto  **/
        if ($request->file) {
            $foto = $this->fotoRepository->uploadAndCreate($request);
            $propaganda->foto()->save($foto);

            //Upload p/ Cloudinary e delete local
            $publicId = 'propaganda_'.time();
            $retorno = $this->fotoRepository->sendToCloudinary($foto, $publicId);
            $this->fotoRepository->deleteLocal($foto->id);
        }

        Flash::success('Propaganda criada com sucesso.');
        return redirect(route('propagandas.index'));
    }

    /**
     * Display the specified Propaganda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $propaganda = $this->propagandaRepository->findWithoutFail($id);

        if (empty($propaganda)) {
            Flash::error('Propaganda não encontrada');

            return redirect(route('propagandas.index'));
        }

        return view('propagandas.show')->with('propaganda', $propaganda);
    }

    /**
     * Show the form for editing the specified Propaganda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $propaganda = $this->propagandaRepository->findWithoutFail($id);

        if (empty($propaganda)) {
            Flash::error('Propaganda não encontrada');

            return redirect(route('propagandas.index'));
        }

        return view('propagandas.edit')->with('propaganda', $propaganda);
    }

    /**
     * Update the specified Propaganda in storage.
     *
     * @param  int              $id
     * @param UpdatePropagandaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePropagandaRequest $request)
    {
        $propaganda = $this->propagandaRepository->findWithoutFail($id);

        if (empty($propaganda)) {
            Flash::error('Propaganda não encontrada');
            return redirect(route('propagandas.index'));
        }

        /* Se houver um file na request, entao, salvar a foto  **/
        if ($request->file) {
            $foto = $this->fotoRepository->uploadAndCreate($request);
            $propaganda->foto()->delete();
            $propaganda->foto()->save($foto);

            //Upload p/ Cloudinary e delete local
            $publicId = 'propaganda_'.time();
            $retorno = $this->fotoRepository->sendToCloudinary($foto, $publicId);
            $this->fotoRepository->deleteLocal($foto->id);
        }
        
        $propaganda = $this->propagandaRepository->update($request->all(), $id);
        Flash::success('Propaganda atualizada com sucesso.');
        return redirect(route('propagandas.index'));
    }

    /**
     * Remove the specified Propaganda from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $propaganda = $this->propagandaRepository->findWithoutFail($id);
        if (empty($propaganda)) {
            Flash::error('Propaganda não encontrada');
            return redirect(route('propagandas.index'));
        }

        $this->propagandaRepository->delete($id);
        Flash::success('Propaganda removida com sucesso.');

        return redirect(route('propagandas.index'));
    }
}
