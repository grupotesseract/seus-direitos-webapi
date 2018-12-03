<?php

namespace App\DataTables\Scopes;

use App\Models\User;
use Yajra\DataTables\Contracts\DataTableScope;

class PorSindicatoDaInstituicao implements DataTableScope
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

            //Filtrando query para mostrar apenas os registros que tiverem instituicao e sindicato_id da instituicao igual ao do usuario logado.
            return $query->whereHas('instituicao', function ($qInstituicao) use ($sindicatoId) {
                $qInstituicao->where('sindicato_id', $sindicatoId);
            });
        }

        return $query;
    }
}
