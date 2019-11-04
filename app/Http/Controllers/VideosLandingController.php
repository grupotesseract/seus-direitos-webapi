<?php

namespace App\Http\Controllers;

use App\DataTables\VideosLandingDataTable;
use App\Http\Requests\CreateVideosLandingRequest;
use App\Http\Requests\UpdateVideosLandingRequest;
use App\Repositories\VideosLandingRepository;
use Flash;
use Response;

class VideosLandingController extends AppBaseController
{
    /** @var VideosLandingRepository */
    private $videosLandingRepository;

    public function __construct(VideosLandingRepository $videosLandingRepo)
    {
        $this->videosLandingRepository = $videosLandingRepo;
    }

    /**
     * Display a listing of the VideosLanding.
     *
     * @param VideosLandingDataTable $videosLandingDataTable
     * @return Response
     */
    public function index(VideosLandingDataTable $videosLandingDataTable)
    {
        return $videosLandingDataTable->render('videos_landings.index');
    }

    /**
     * Show the form for creating a new VideosLanding.
     *
     * @return Response
     */
    public function create()
    {
        return view('videos_landings.create');
    }

    /**
     * Store a newly created VideosLanding in storage.
     *
     * @param CreateVideosLandingRequest $request
     *
     * @return Response
     */
    public function store(CreateVideosLandingRequest $request)
    {
        $input = $request->all();

        $videosLanding = $this->videosLandingRepository->create($input);

        Flash::success('Videos Landing saved successfully.');

        return redirect(route('videosLandings.index'));
    }

    /**
     * Display the specified VideosLanding.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $videosLanding = $this->videosLandingRepository->findWithoutFail($id);

        if (empty($videosLanding)) {
            Flash::error('Videos Landing not found');

            return redirect(route('videosLandings.index'));
        }

        return view('videos_landings.show')->with('videosLanding', $videosLanding);
    }

    /**
     * Show the form for editing the specified VideosLanding.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $videosLanding = $this->videosLandingRepository->findWithoutFail($id);

        if (empty($videosLanding)) {
            Flash::error('Videos Landing not found');

            return redirect(route('videosLandings.index'));
        }

        return view('videos_landings.edit')->with('videosLanding', $videosLanding);
    }

    /**
     * Update the specified VideosLanding in storage.
     *
     * @param  int              $id
     * @param UpdateVideosLandingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVideosLandingRequest $request)
    {
        $videosLanding = $this->videosLandingRepository->findWithoutFail($id);

        if (empty($videosLanding)) {
            Flash::error('Videos Landing not found');

            return redirect(route('videosLandings.index'));
        }

        $videosLanding = $this->videosLandingRepository->update($request->all(), $id);

        Flash::success('Videos Landing updated successfully.');

        return redirect(route('videosLandings.index'));
    }

    /**
     * Remove the specified VideosLanding from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $videosLanding = $this->videosLandingRepository->findWithoutFail($id);

        if (empty($videosLanding)) {
            Flash::error('Videos Landing not found');

            return redirect(route('videosLandings.index'));
        }

        $this->videosLandingRepository->delete($id);

        Flash::success('Videos Landing deleted successfully.');

        return redirect(route('videosLandings.index'));
    }
}
