<?php

namespace App\Http\Controllers;

use Auth;
use Flash;
use Response;
use App\DataTables\BeneficioDataTable;
use App\DataTables\Scopes\PorSindicato;
use App\Repositories\BeneficioRepository;
use App\Http\Requests\CreateBeneficioRequest;

class BeneficioController extends AppBaseController
{
    /** @var BeneficioRepository */
    private $beneficioRepository;

    public function __construct(BeneficioRepository $beneficioRepo)
    {
        $this->beneficioRepository = $beneficioRepo;
    }

    /**
     * Display a listing of the Beneficio.
     *
     * @param BeneficioDataTable $beneficioDataTable
     * @return Response
     */
    public function index(BeneficioDataTable $beneficioDataTable)
    {
        return $beneficioDataTable
            ->addScope(new PorSindicato(Auth::user()))
            ->render('beneficios.index');
    }

    /**
     * Show the form for creating a new Beneficio.
     *
     * @return Response
     */
    public function create()
    {
        $sindicato_id = Auth::user()->hasRole('superadmin') ? null : Auth::user()->sindicato_id;

        return view('beneficios.create')->with('sindicatoId', $sindicato_id);
    }

    /**
     * Store a newly created Beneficio in storage.
     *
     * @param CreateBeneficioRequest $request
     *
     * @return Response
     */
    public function store(CreateBeneficioRequest $request)
    {
        $input = $request->all();

        $beneficio = $this->beneficioRepository->create($input);

        Flash::success('Beneficio criado com sucesso.');

        return redirect(route('beneficios.index'));
    }

    /**
     * Remove the specified Beneficio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $beneficio = $this->beneficioRepository->findWithoutFail($id);

        if (empty($beneficio)) {
            Flash::error('Beneficio não encontrado');

            return redirect(route('beneficios.index'));
        }

        $this->beneficioRepository->delete($id);

        Flash::success('Beneficio removido.');

        return redirect(route('beneficios.index'));
    }
}
