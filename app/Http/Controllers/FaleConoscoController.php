<?php

namespace App\Http\Controllers;

use App\DataTables\FaleConoscoDataTable;
use App\DataTables\Scopes\PorSindicato;
use App\Http\Requests\CreateFaleConoscoRequest;
use App\Http\Requests\UpdateFaleConoscoRequest;
use App\Models\Sindicato as Sindicato;
use App\Repositories\FaleConoscoRepository;
use Flash;
use Response;

class FaleConoscoController extends AppBaseController
{
    /** @var FaleConoscoRepository */
    private $faleConoscoRepository;

    public function __construct(FaleConoscoRepository $faleConoscoRepo)
    {
        $this->faleConoscoRepository = $faleConoscoRepo;
    }

    /**
     * Display a listing of the FaleConosco.
     *
     * @param FaleConoscoDataTable $faleConoscoDataTable
     * @return Response
     */
    public function index(FaleConoscoDataTable $faleConoscoDataTable)
    {
        return $faleConoscoDataTable
            ->addScope(new PorSindicato(\Auth::user()))
            ->render('fale_conoscos.index');
    }

    /**
     * Show the form for creating a new FaleConosco.
     *
     * @return Response
     */
    public function create()
    {
        return view('fale_conoscos.create');
    }

    /**
     * Show the form for creating a new FaleConosco.
     *
     * @return Response
     */
    public function createApp($idSindicato)
    {
        $sindicato = Sindicato::find($idSindicato);

				return view('fale_conoscos.create_app')->with('sindicato', $sindicato);
    }

    /**
     * Store a newly created FaleConosco in storage.
     *
     * @param CreateFaleConoscoRequest $request
     *
     * @return Response
     */
    public function store(CreateFaleConoscoRequest $request)
    {
				$input = $request->all();
				
        $faleConosco = $this->faleConoscoRepository->create($input);

        $sindicato = Sindicato::find($input['sindicato_id']);

        Flash::success('Mensagem enviada com sucesso.');
        //return redirect(route('faleConoscos.index'));
        return view('fale_conoscos.create_app')->with('sindicato', $sindicato);
    }

    /**
     * Display the specified FaleConosco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $faleConosco = $this->faleConoscoRepository->findWithoutFail($id);

        if (empty($faleConosco)) {
            Flash::error('Fale Conosco not found');

            return redirect(route('faleConoscos.index'));
        }

        return view('fale_conoscos.show')->with('faleConosco', $faleConosco);
    }

    /**
     * Show the form for editing the specified FaleConosco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $faleConosco = $this->faleConoscoRepository->findWithoutFail($id);

        if (empty($faleConosco)) {
            Flash::error('Fale Conosco not found');

            return redirect(route('faleConoscos.index'));
        }

        return view('fale_conoscos.edit')->with('faleConosco', $faleConosco);
    }

    /**
     * Update the specified FaleConosco in storage.
     *
     * @param  int              $id
     * @param UpdateFaleConoscoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFaleConoscoRequest $request)
    {
        $faleConosco = $this->faleConoscoRepository->findWithoutFail($id);

        if (empty($faleConosco)) {
            Flash::error('Fale Conosco not found');

            return redirect(route('faleConoscos.index'));
        }

        $faleConosco = $this->faleConoscoRepository->update($request->all(), $id);

        Flash::success('Fale Conosco updated successfully.');

        return redirect(route('faleConoscos.index'));
    }

    /**
     * Remove the specified FaleConosco from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $faleConosco = $this->faleConoscoRepository->findWithoutFail($id);

        if (empty($faleConosco)) {
            Flash::error('Fale Conosco not found');

            return redirect(route('faleConoscos.index'));
        }

        $this->faleConoscoRepository->delete($id);

        Flash::success('Fale Conosco deleted successfully.');

        return redirect(route('faleConoscos.index'));
    }
}
