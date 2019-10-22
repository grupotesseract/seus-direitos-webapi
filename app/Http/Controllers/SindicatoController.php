<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\DataTables\CidadeDataTable;
use App\Repositories\FotoRepository;
use App\Repositories\SindicatoRepository;
use App\Http\Requests\CreateSindicatoRequest;
use App\Http\Requests\UpdateSindicatoRequest;
use Prettus\Repository\Criteria\RequestCriteria;
use \App\Models\Sindicato;

/**
 * @resource Sindicato
 *
 * Sindicato routes
 */
class SindicatoController extends AppBaseController
{
    /** @var SindicatoRepository */
    private $sindicatoRepository;
    private $fotoRepository;

    /**
     * Construtor recebendo repositorios necessarios..
     *
     * @param SindicatoRepository $sindicatoRepo
     * @param FotoRepository $fotoRepo
     */
    public function __construct(SindicatoRepository $sindicatoRepo, FotoRepository $fotoRepo)
    {
        $this->sindicatoRepository = $sindicatoRepo;
        $this->fotoRepository = $fotoRepo;
    }

    /**
     * Display a listing of the Sindicato.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sindicatoRepository->pushCriteria(new RequestCriteria($request));
        $sindicatos = $this->sindicatoRepository->all();

        return view('sindicatos.index')
            ->with('sindicatos', $sindicatos);
		}
		
		/**
     * Display a listing of the Sindicato.
     *
     * @param Request $request
     * @return Response
     */
    public function indexTrashed(Request $request)
    {
        $this->sindicatoRepository->pushCriteria(new RequestCriteria($request));
        $sindicatos = $this->sindicatoRepository->onlyTrashed()->get();

        return view('sindicatos.index')
            ->with('sindicatos', $sindicatos); 
    }

    /**
     * Serve a view do Crud de sindicatos com a Datatable de cidades embutida.
     */
    public function create(CidadeDataTable $cidadesDataTable)
    {
        return $cidadesDataTable->render('sindicatos.create');
    }

    /**
     * Store a newly created Sindicato in storage.
     *
     * @param CreateSindicatoRequest $request
     *
     * @return Response
     */
    public function store(CreateSindicatoRequest $request)
    {
        $input = $request->all();

        $sindicato = $this->sindicatoRepository->create($input);

        /* Se houver um file na request, entao, salvar img de logo do sindicato **/
        if ($request->file) {
            $foto = $this->fotoRepository->uploadAndCreate($request);
            $sindicato->logo()->save($foto);

            //Upload p/ Cloudinary e delete local
            $publicId = 'logo_sindicato_'.time();
            $retorno = $this->fotoRepository->sendToCloudinary($foto, $publicId);
            $this->fotoRepository->deleteLocal($foto->id);
        }

        /* Se houver cidades, syncar tb.. **/
        if ($sindicato && $request->id_cidades) {
            $sindicato->cidades()->sync($request->id_cidades);
        }

        Flash::success('Sindicato salvo com sucesso.');

        return redirect(route('sindicatos.index'));
    }

    /**
     * Display the specified Sindicato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sindicato = $this->sindicatoRepository->findWithoutFail($id);

        if (empty($sindicato)) {
            Flash::error('Sindicato não encontrado');

            return redirect(route('sindicatos.index'));
        }

        return view('sindicatos.show')->with('sindicato', $sindicato);
    }

    /**
     * Show the form for editing the specified Sindicato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(CidadeDataTable $cidadesDataTable, $id)
    {
        $sindicato = $this->sindicatoRepository->findWithoutFail($id);

        if (empty($sindicato)) {
            Flash::error('Sindicato não encontrado');

            return redirect(route('sindicatos.index'));
        }

        return $cidadesDataTable->render('sindicatos.edit', compact('sindicato'));
    }

    /**
     * Update the specified Sindicato in storage.
     *
     * @param  int              $id
     * @param UpdateSindicatoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSindicatoRequest $request)
    {
        $sindicato = $this->sindicatoRepository->findWithoutFail($id);

        if (empty($sindicato)) {
            Flash::error('Sindicato não encontrado');

            return redirect(route('sindicatos.index'));
        }

        $sindicato = $this->sindicatoRepository->update($request->all(), $id);

        /* Se houver um file na request, entao, salvar img de logo do sindicato **/
        if ($request->file) {
            $foto = $this->fotoRepository->uploadAndCreate($request);
            $sindicato->logo()->delete();
            $sindicato->logo()->save($foto);

            //Upload p/ Cloudinary e delete local
            $publicId = 'logo_sindicato_'.time();
            $retorno = $this->fotoRepository->sendToCloudinary($foto, $publicId);
            $this->fotoRepository->deleteLocal($foto->id);
        }

        if ($sindicato) {
            $cidades = $request->id_cidades ? $request->id_cidades : [];
            $sindicato->cidades()->sync($cidades);
        }

        Flash::success('Sindicato atualizado com sucesso.');

        return redirect(route('sindicatos.index'));
    }

    /**
     * Remove the specified Sindicato from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sindicato = $this->sindicatoRepository->findWithoutFail($id);
				$sindicatoWithTrashed = Sindicato::withTrashed()->find($id);

				if ($sindicatoWithTrashed->trashed()) {
					$sindicatoWithTrashed->associados()->restore();
					$sindicatoWithTrashed->restore();					

					Flash::success('Sindicato restaurado com successo.');
					return redirect(route('sindicatos.index'));
				}
				
				if (empty($sindicato)) {
            Flash::error('Sindicato não encontrado');

            return redirect(route('sindicatos.index'));
        }

				$this->sindicatoRepository->delete($id);
				$sindicato->associados()->delete();

        Flash::success('Sindicato excluído com successo.');

        return redirect(route('sindicatos.index'));
    }
}
