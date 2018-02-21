<?php

namespace App\Presenters;

use App\Transformers\SindicatoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SindicatoPresenter.
 */
class SindicatoPresenter extends FractalPresenter
{
    /**
     * Transformer.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SindicatoTransformer();
    }
}
