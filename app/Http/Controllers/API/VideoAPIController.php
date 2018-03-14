<?php

namespace App\Http\Controllers\API;

use Response;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Repositories\VideoRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateVideoAPIRequest;
use App\Http\Requests\API\UpdateVideoAPIRequest;
use Prettus\Repository\Criteria\RequestCriteria;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;

/**
 * Class VideoController.
 */
class VideoAPIController extends AppBaseController
{
    /** @var VideoRepository */
    private $videoRepository;

    public function __construct(VideoRepository $videoRepo)
    {
        $this->videoRepository = $videoRepo;
    }

    /**
     * Display a listing of the Video.
     * GET|HEAD /videos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->videoRepository->pushCriteria(new RequestCriteria($request));
        $this->videoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $videos = $this->videoRepository->all();

        return $this->sendResponse($videos->toArray(), 'Videos retrieved successfully');
    }

    /**
     * Store a newly created Video in storage.
     * POST /videos.
     *
     * @param CreateVideoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVideoAPIRequest $request)
    {
        $input = $request->all();

        $videos = $this->videoRepository->create($input);

        return $this->sendResponse($videos->toArray(), 'Video saved successfully');
    }

    /**
     * Display the specified Video.
     * GET|HEAD /videos/{id}.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Video $video */
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            return $this->sendError('Video not found');
        }

        return $this->sendResponse($video->toArray(), 'Video retrieved successfully');
    }

    /**
     * Update the specified Video in storage.
     * PUT/PATCH /videos/{id}.
     *
     * @param  int $id
     * @param UpdateVideoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVideoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Video $video */
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            return $this->sendError('Video not found');
        }

        $video = $this->videoRepository->update($input, $id);

        return $this->sendResponse($video->toArray(), 'Video updated successfully');
    }

    /**
     * Remove the specified Video from storage.
     * DELETE /videos/{id}.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Video $video */
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            return $this->sendError('Video not found');
        }

        $video->delete();

        return $this->sendResponse($id, 'Video deleted successfully');
    }
}
