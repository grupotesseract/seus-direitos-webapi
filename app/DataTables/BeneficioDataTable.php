<?php

namespace App\DataTables;

use App\Models\Beneficio;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class BeneficioDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'beneficios.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Beneficio $model)
    {
        return $model->newQuery();
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
            ->addAction(['width' => '80px', 'title' => ''])
            ->parameters([
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
                'buttons' => [
                    [
                        'extend'  => 'create',
                        'text'    => '<i class="fa fa-plus"></i> Criar novo',
                    ],
                    [
                        'extend'  => 'collection',
                        'text'    => '<i class="fa fa-download"></i> Exportar',
                        'buttons' => [
                            'csv',
                            'excel',
                        ],
                    ],
                ],
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
            'nome',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'beneficiosdatatable_'.time();
    }
}
