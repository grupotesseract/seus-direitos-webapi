<?php

namespace App\Transformers;

use App\Models\Sindicato;
use League\Fractal\TransformerAbstract;

/**
 * Class SindicatoTransformer.
 */
class SindicatoTransformer extends TransformerAbstract
{
    /**
     * Transform the Sindicato entity.
     * @param App\Entities\Sindicato $model
     *
     * @return array
     */
    public function transform(Sindicato $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'nome' => $model->nome,
            'cidades' => $model->cidades,
        ];
    }
}
