<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class PorRole implements DataTableScope
{
    private $role;

    /**
     * @param mixed
     */
    public function __construct($role)
    {
        $this->role = $role;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        if ($this->role) {
            return $query->whereHas('roles', function ($query) {
                $query->where('name', $this->role);
            });
        }

        return $query;
    }
}
