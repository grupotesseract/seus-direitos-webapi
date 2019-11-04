<?php

namespace App\Http\Controllers;

use Flash;
use Cloudder;
use Response;
use App\DataTables\NoticiasLandingDataTable;
use App\Repositories\NoticiasLandingRepository;
use App\Http\Requests\CreateNoticiasLandingRequest;
use App\Http\Requests\UpdateNoticiasLandingRequest;
use App\Models\NoticiasLanding;
use App\Models\VideosLanding;

class NoticiasLandingController extends AppBaseController
{
    /** @var NoticiasLandingRepository */
    private $noticiasLandingRepository;

    public function __construct(NoticiasLandingRepository $noticiasLandingRepo)
    {
        $this->noticiasLandingRepository = $noticiasLandingRepo;
    }

    /**
     * Display a listing of the NoticiasLanding.
     *
     * @param NoticiasLandingDataTable $noticiasLandingDataTable
     * @return Response
     */
    public function index(NoticiasLandingDataTable $noticiasLandingDataTable)
    {
        return $noticiasLandingDataTable->render('noticias_landings.index');
    }

    /**
     * Show the form for creating a new NoticiasLanding.
     *
     * @return Response
     */
    public function create()
    {
        return view('noticias_landings.create');
    }

    /**
     * Store a newly created NoticiasLanding in storage.
     *
     * @param CreateNoticiasLandingRequest $request
     *
     * @return Response
     */
    public function store(CreateNoticiasLandingRequest $request)
    {
        $cloud = Cloudder::upload($request->file('imagem_form')->path());

        $extensao = $request->file('imagem_form')->extension();
        $publicId = Cloudder::getPublicId();

        $request->request->add(['imagem' => $publicId, 'extensao' => $extensao]);

        $input = $request->all();

        $noticiasLanding = $this->noticiasLandingRepository->create($input);

        Flash::success('Notícia salva com sucesso');

        return redirect(route('noticiasLandings.index'));
    }

    /**
     * Display the specified NoticiasLanding.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $noticiasLanding = $this->noticiasLandingRepository->findWithoutFail($id);

        if (empty($noticiasLanding)) {
            Flash::error('Notícia não encontrada');

            return redirect(route('noticiasLandings.index'));
        }

        return view('noticias_landings.show')->with('noticiasLanding', $noticiasLanding);
    }

    /**
     * Show the form for editing the specified NoticiasLanding.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $noticiasLanding = $this->noticiasLandingRepository->findWithoutFail($id);

        if (empty($noticiasLanding)) {
            Flash::error('Notícia não encontrada');

            return redirect(route('noticiasLandings.index'));
        }

        return view('noticias_landings.edit')->with('noticiasLanding', $noticiasLanding);
    }

    /**
     * Update the specified NoticiasLanding in storage.
     *
     * @param  int              $id
     * @param UpdateNoticiasLandingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNoticiasLandingRequest $request)
    {
        $noticiasLanding = $this->noticiasLandingRepository->findWithoutFail($id);

        if (empty($noticiasLanding)) {
            Flash::error('Notícia não encontrada');

            return redirect(route('noticiasLandings.index'));
        }

        $cloud = Cloudder::upload($request->file('imagem_form')->path());

        $extensao = $request->file('imagem_form')->extension();
        $publicId = Cloudder::getPublicId();

        $request->request->add(['imagem' => $publicId, 'extensao' => $extensao]);

        $input = $request->all();

        $noticiasLanding = $this->noticiasLandingRepository->update($request->all(), $id);

        Flash::success('Notícia atualizada com sucesso');

        return redirect(route('noticiasLandings.index'));
    }

    /**
     * Remove the specified NoticiasLanding from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $noticiasLanding = $this->noticiasLandingRepository->findWithoutFail($id);

        if (empty($noticiasLanding)) {
            Flash::error('Notícia não encontrada');

            return redirect(route('noticiasLandings.index'));
        }

        $this->noticiasLandingRepository->delete($id);

        Flash::success('Notícia excluída com sucesso');

        return redirect(route('noticiasLandings.index'));
		}
		
		public function getLandingPage()
		{
				$noticiaLanding = NoticiasLanding::first();
				$videoLanding = VideosLanding::first();

				
				return view('landing-page.home')->with(['noticiaLanding' => $noticiaLanding, 'videoLanding' => $videoLanding]);
		}
}
