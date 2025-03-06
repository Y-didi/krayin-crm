<?php

namespace Webkul\Admin\DataGrids\Consultant;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class ConsultantDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     */
    public function prepareQueryBuilder(): Builder
    {
        $tablePrefix = DB::getTablePrefix();

        $queryBuilder = DB::table('consultants')
            ->select(
                'consultants.id',
                'consultants.last_name',
                'consultants.first_name',
                'consultants.title',
                'consultants.phone',
                'consultants.email',
                'consultants.cjm',
                'consultants.tjm',
            );


        return $queryBuilder;
    }

    /**
     * Add columns.
     */
    public function prepareColumns(): void
    {
        $this->addColumn([
            'index'      => 'last_name',
            'label'      => trans('admin::app.consultants.index.datagrid.last_name'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'first_name',
            'label'      => trans('admin::app.consultants.index.datagrid.first_name'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'title',
            'label'      => trans('admin::app.consultants.index.datagrid.title'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);


        $this->addColumn([
            'index'      => 'phone',
            'label'      => trans('admin::app.consultants.index.datagrid.phone'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'email',
            'label'      => trans('admin::app.consultants.index.datagrid.email'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'tjm',
            'label'      => trans('admin::app.consultants.index.datagrid.tjm'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => false,
            'filterable' => true,
            'closure'    => fn($row) => round($row->tjm, 2),
        ]);

        $this->addColumn([
            'index'      => 'cjm',
            'label'      => trans('admin::app.consultants.index.datagrid.cjm'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => false,
            'filterable' => true,
            'closure'    => fn($row) => round($row->cjm, 2),
        ]);
    }

    /**
     * Prepare actions.
     */
    public function prepareActions(): void
    {
        if (bouncer()->hasPermission('consultants.view')) {
            $this->addAction([
                'index'  => 'view',
                'icon'   => 'icon-eye',
                'title'  => trans('admin::app.consultants.index.datagrid.view'),
                'method' => 'GET',
                'url'    => fn($row) => route('admin.consultants.view', $row->id),
            ]);
        }

        if (bouncer()->hasPermission('products.edit')) {
            $this->addAction([
                'index'  => 'edit',
                'icon'   => 'icon-edit',
                'title'  => trans('admin::app.products.index.datagrid.edit'),
                'method' => 'GET',
                'url'    => fn($row) => route('admin.consultants.edit', $row->id),
            ]);
        }

        if (bouncer()->hasPermission('consultants.delete')) {
            $this->addAction([
                'index'  => 'delete',
                'icon'   => 'icon-delete',
                'title'  => trans('admin::app.consultants.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => fn($row) => route('admin.consultants.delete', $row->id),
            ]);
        }
    }

    /**
     * Prepare mass actions.
     */
    public function prepareMassActions(): void
    {
        $this->addMassAction([
            'icon'   => 'icon-delete',
            'title'  => trans('admin::app.consultants.index.datagrid.delete'),
            'method' => 'POST',
            'url'    => route('admin.consultants.mass_delete'),
        ]);
    }
}
