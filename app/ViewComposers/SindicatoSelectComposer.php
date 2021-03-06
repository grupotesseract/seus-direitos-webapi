<?php

namespace App\ViewComposers;

use App\Repositories\SindicatoRepository;
use Illuminate\View\View;

class SindicatoSelectComposer
{
    protected $sindicatoRepository;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(SindicatoRepository $sindicatoRepository)
    {
        $this->sindicatoRepository = $sindicatoRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $sindicatos = $this->sindicatoRepository->getCamposSelect();

        $view
            ->with('selectSindicatos', $sindicatos);
    }
}
