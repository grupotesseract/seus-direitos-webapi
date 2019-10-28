<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class Trashed implements DataTableScope
{
    private $sindicatoId;

    /**
     * @param mixed
     */
    public function __construct()
    {
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->onlyTrashed();
    }
}
