<?php

namespace App\ViewComposers;

use App\Repositories\CategoriaRepository;
use App\Repositories\EstadoRepository;
use Illuminate\View\View;

class SindicatoComposer
{
    protected $categorias;
    protected $estados;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(CategoriaRepository $categorias, EstadoRepository $estados)
    {
        $this->categorias = $categorias;
        $this->estados = $estados;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $categorias = $this->categorias->getCamposSelect();
        $estados = $this->estados->getCamposSelect();

        $view
            ->with('categorias', $categorias)
            ->with('estados', $estados);
    }
}
