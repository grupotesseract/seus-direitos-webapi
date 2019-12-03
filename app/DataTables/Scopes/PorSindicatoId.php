<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class PorSindicatoId implements DataTableScope
{
    private $sindicatoId;

    /**
     * @param mixed
     */
    public function __construct($sindicatoId)
    {
        $this->sindicatoId = $sindicatoId;
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
