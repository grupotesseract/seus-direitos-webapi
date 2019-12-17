<?php

namespace App\DataTables\Scopes;

use App\Models\Sindicato;
use App\Models\User;
use Yajra\DataTables\Contracts\DataTableScope;

class PorCategoriasdoSindicato implements DataTableScope
{
    private $sindicatoId;

    /**
     * @param mixed
     */
    public function __construct(User $user)
    {
        $this->sindicatoId = $user->hasRole('superadmin')
            ? null
            : $user->sindicato_id;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        if ($this->sindicatoId) {
            $sindicatoId = $this->sindicatoId;
            $categoriasIds = Sindicato::find($sindicatoId)->categorias()->pluck('id');

            return $query->whereIn('categoria_id', $categoriasIds);
        }

        return $query;
    }
}
