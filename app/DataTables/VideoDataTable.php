<?php

namespace App\DataTables;

use App\Models\Video;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class VideoDataTable extends DataTable
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

        if (\Auth::user()->hasRole('superadmin')) {
            $dataTable->addColumn('destaque', function ($model) {
                $emDestaque = $model->destaque;

                return $emDestaque ? 'Sim' : 'Não';
            });
        }

        return $dataTable->addColumn('action', 'videos.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Video $model)
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
            ->addAction(['width' => '100px', 'title' => 'Ações'])
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
        $array = \Auth::user()->hasRole('superadmin')
            ? ['destaque']
            : [];

        return $array
            +
            [
                'titulo',
                'descricao',
                'youtube_id',
            ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'videosdatatable_'.time();
    }
}
