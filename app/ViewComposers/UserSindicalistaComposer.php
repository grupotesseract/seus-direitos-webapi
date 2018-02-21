<?php

namespace App\ViewComposers;

use Illuminate\View\View;
use App\Repositories\SindicatoRepository;

class UserSindicalistaComposer
{
    protected $sindicatos;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(SindicatoRepository $sindicatos)
    {
        $this->sindicatos = $sindicatos;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $sindicatos = $this->sindicatos->getCamposSelect();
        $view->with('sindicatos', $sindicatos);
    }
}
