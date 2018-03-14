<?php

namespace App\Http\Controllers;

use Auth;
use Flash;
use Response;
use App\Http\Requests;
use App\DataTables\VideoDataTable;
use App\Repositories\VideoRepository;
use App\DataTables\Scopes\PorSindicato;
use App\Http\Requests\CreateVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Http\Controllers\AppBaseController;

class VideoController extends AppBaseController
{
    /** @var  VideoRepository */
    private $videoRepository;

    public function __construct(VideoRepository $videoRepo)
    {
        $this->videoRepository = $videoRepo;
    }

    /**
     * Display a listing of the Video.
     *
     * @param VideoDataTable $videoDataTable
     * @return Response
     */
    public function index(VideoDataTable $videoDataTable)
    {
        return $videoDataTable
            ->addScope(new PorSindicato(Auth::user()))
            ->render('videos.index');
    }

    /**
     * Show the form for creating a new Video.
     *
     * @return Response
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created Video in storage.
     *
     * @param CreateVideoRequest $request
     *
     * @return Response
     */
    public function store(CreateVideoRequest $request)
    {
        $input = $request->all();

        $video = $this->videoRepository->create($input);

        Flash::success('Video criado com sucesso.');

        return redirect(route('videos.index'));
    }

    /**
     * Display the specified Video.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            Flash::error('Video não encontrado');

            return redirect(route('videos.index'));
        }

        return view('videos.show')->with('video', $video);
    }

    /**
     * Show the form for editing the specified Video.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            Flash::error('Video não encontrado');

            return redirect(route('videos.index'));
        }

        return view('videos.edit')->with('video', $video);
    }

    /**
     * Update the specified Video in storage.
     *
     * @param  int              $id
     * @param UpdateVideoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVideoRequest $request)
    {
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            Flash::error('Video não encontrado');

            return redirect(route('videos.index'));
        }

        $video = $this->videoRepository->update($request->all(), $id);

        Flash::success('Video atualizado com sucesso.');

        return redirect(route('videos.index'));
    }

    /**
     * Remove the specified Video from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            Flash::error('Video não encontrado');

            return redirect(route('videos.index'));
        }

        $this->videoRepository->delete($id);

        Flash::success('Video removido com sucesso.');

        return redirect(route('videos.index'));
    }


    /**
     * Rota para settar o video de destaque
     *
     * @return void
     */
    public function postVideoDestaque($id)
    {
        $video = $this->videoRepository->findWithoutFail($id);
        if (empty($video)) {
            Flash::error('Video não encontrado');
            return redirect(route('videos.index'));
        }
        
        $deuCerto = $this->videoRepository->setVideoDestaque($video);

        if ($deuCerto) {
            Flash::success('Video em destaque atualizado.');
        }

        return redirect(route('videos.index'));
    }
    
}
