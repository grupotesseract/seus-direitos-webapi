<?php

namespace App\Http\Controllers\API;

use Auth;
use App\Repositories\VideoRepository;
use App\Repositories\PropagandaRepository;
use App\Http\Controllers\AppBaseController;

/**
 * @resource HOME API, servindo as informaçoes que aparecem na HOME do aplicativo
 *
 * Auth API
 */
class HomeAPIController extends AppBaseController
{
    /** @var VideoRepository */
    private $videoRepository;

    /** @var PropagandaRepository */
    private $propagandaRepository;

    /**
     * __construct - Com Repositorios necessarios.
     *
     * @param VideoRepository $videoRepo
     * @param PropagandaRepository $propagandaRepo
     */
    public function __construct(VideoRepository $videoRepo, PropagandaRepository $propagandaRepo)
    {
        $this->videoRepository = $videoRepo;
        $this->propagandaRepository = $propagandaRepo;
    }

    /**
     * Metodo para retornar por GET as informacoes da Home do aplicativo.
     */
    public function getHome()
    {
        $video = $this->videoRepository->getVideoEmDestaque();
        $propagandas = $this->propagandaRepository->all()->toArray();

        $retorno = [
            'video' => $video->toArray(),
            'propagandas' =>  $propagandas,
        ];

        return $this->sendResponse($retorno, 'Video em destaque e Propagandas');
    }
}
