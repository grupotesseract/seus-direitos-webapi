<?php

namespace App\DataTables\Scopes;

use App\Models\User;
use Yajra\DataTables\Contracts\DataTableScope;

class PorSindicato implements DataTableScope
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
            return $query->where('sindicato_id', $this->sindicatoId);
        }

        return $query;
    }
}
