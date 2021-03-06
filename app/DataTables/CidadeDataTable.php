<?php

namespace App\DataTables;

use App\Models\Cidade;
use Yajra\DataTables\Services\DataTable;

class CidadeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('selecionar', 'sindicatos.botao-selecionar')
            ->rawColumns(['selecionar']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Cidade $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Cidade $model)
    {
        return $model->newQuery()->with('estado');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters([
                        'dom' => 'frti',
                        'language' => ['url' => '//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json'],
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'selecionar' => ['name' => 'selecionar', 'orderable'=>false, 'searchable' => false],
            'nome' => ['name' => 'nome', 'data' => 'nome'],
            'estado' => ['name' => 'estado.sigla', 'data' => 'estado.sigla', 'orderable'=>false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Cidade_'.date('YmdHis');
    }
}
