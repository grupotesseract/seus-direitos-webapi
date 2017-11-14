<?php

namespace App\Presenters;

use App\Transformers\SindicatoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SindicatoPresenter
 *
 * @package namespace App\Presenters;
 */
class SindicatoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SindicatoTransformer();
    }
}
