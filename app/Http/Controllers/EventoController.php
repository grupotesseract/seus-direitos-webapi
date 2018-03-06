<?php

namespace App\Http\Controllers;

use Flash;
use Cloudder;
use Response;
use Illuminate\Http\Request;
use App\Repositories\EventoRepository;
use App\Http\Requests\CreateEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use Prettus\Repository\Criteria\RequestCriteria;

class EventoController extends AppBaseController
{
    /** @var EventoRepository */
    private $eventoRepository;

    public function __construct(EventoRepository $eventoRepo)
    {
        $this->eventoRepository = $eventoRepo;
    }

    /**
     * Display a listing of the Evento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventoRepository->pushCriteria(new RequestCriteria($request));
        $eventos = $this->eventoRepository->all();

        return view('eventos.index')
            ->with('eventos', $eventos);
    }

    /**
     * Show the form for creating a new Evento.
     *
     * @return Response
     */
    public function create()
    {
        return view('eventos.create');
    }

    /**
     * Store a newly created Evento in storage.
     *
     * @param CreateEventoRequest $request
     *
     * @return Response
     */
    public function store(CreateEventoRequest $request)
    {
        $cloud = Cloudder::upload($request->file('cartaz')->path());

        $extensao = $request->file('cartaz')->extension();
        $publicId = Cloudder::getPublicId();

        $request->request->add(['linkimagem' => $publicId, 'extensao' => $extensao]);

        $input = $request->all();

        $evento = $this->eventoRepository->create($input);

        Flash::success('Evento salvo com sucesso.');

        return redirect(route('eventos.index'));
    }

    /**
     * Display the specified Evento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $evento = $this->eventoRepository->findWithoutFail($id);

        if (empty($evento)) {
            Flash::error('Evento not found');

            return redirect(route('eventos.index'));
        }

        return view('eventos.show')->with('evento', $evento);
    }

    /**
     * Show the form for editing the specified Evento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $evento = $this->eventoRepository->findWithoutFail($id);

        if (empty($evento)) {
            Flash::error('Evento not found');

            return redirect(route('eventos.index'));
        }

        return view('eventos.edit')->with('evento', $evento);
    }

    /**
     * Update the specified Evento in storage.
     *
     * @param  int              $id
     * @param UpdateEventoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventoRequest $request)
    {
        $evento = $this->eventoRepository->findWithoutFail($id);

        if (empty($evento)) {
            Flash::error('Evento not found');

            return redirect(route('eventos.index'));
        }

        $evento = $this->eventoRepository->update($request->all(), $id);

        Flash::success('Evento updated successfully.');

        return redirect(route('eventos.index'));
    }

    /**
     * Remove the specified Evento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $evento = $this->eventoRepository->findWithoutFail($id);

        if (empty($evento)) {
            Flash::error('Evento not found');

            return redirect(route('eventos.index'));
        }

        $this->eventoRepository->delete($id);

        Flash::success('Evento deleted successfully.');

        return redirect(route('eventos.index'));
    }
}
