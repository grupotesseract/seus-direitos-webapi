<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class PorInstituicaoId implements DataTableScope
{
    private $instituicaoId;

    /**
     * @param mixed
     */
    public function __construct($instituicaoId)
    {
        $this->instituicaoId = $instituicaoId;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        if ($this->instituicaoId) {
            return $query->where('instituicao_id', $this->instituicaoId);
        }

        return $query;
    }
}
