<?php

namespace App\ViewComposers;

use Illuminate\View\View;
use App\Repositories\SindicatoRepository;
use App\Repositories\InstituicaoRepository;

class UserSindicalistaComposer
{
    protected $sindicatos;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(SindicatoRepository $sindicatos, InstituicaoRepository $instituicoes)
    {
        $this->sindicatos = $sindicatos;
        $this->instituicoes = $instituicoes;
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
        $instituicoes = $this->instituicoes->all()->pluck('nomecompleto', 'id');
        $view->with(['sindicatos' => $sindicatos, 'instituicoes' => $instituicoes]);
    }
}
