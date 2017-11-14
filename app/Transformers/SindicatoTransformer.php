<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Sindicato;

/**
 * Class SindicatoTransformer
 * @package namespace App\Transformers;
 */
class SindicatoTransformer extends TransformerAbstract
{

    /**
     * Transform the Sindicato entity
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
