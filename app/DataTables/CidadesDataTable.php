<?php

namespace App\DataTables;

use App\Models\Cidade;
use Yajra\Datatables\Services\DataTable;

class CidadesDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('selecionar', 'sindicatos.botao-selecionar')
            ->rawColumns(['selecionar'])
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = Cidade::with('estado');
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [],
                'language' => ['url' => '//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json'],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'selecionar' => ['name' => 'selecionar', 'orderable'=>false, 'searchable' => false],
            'nome' => ['name' => 'nome', 'data' => 'nome'],
            'estado' => ['name' => 'estado', 'data' => 'estado.sigla', 'searchable' => false,  'orderable'=>false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'empresas';
    }
}
