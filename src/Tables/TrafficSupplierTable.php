<?php

namespace WTroiano\TrafficSupplier\Tables;

use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\Actions\EditAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\BulkChanges\NameBulkChange;
use Botble\Table\Columns\Column;
use Botble\Table\Columns\IdColumn;
use Botble\Table\Columns\NameColumn;
use Botble\Table\Columns\UpdatedAtColumn;
use Botble\Table\Columns\YesNoColumn;
use Botble\Table\HeaderActions\CreateHeaderAction;
use Illuminate\Database\Eloquent\Builder;
use WTroiano\TrafficSupplier\Models\TrafficSupplier;

class TrafficSupplierTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(TrafficSupplier::class)
            ->addHeaderAction(CreateHeaderAction::make()->route('traffic-supplier.create'))
            ->addActions([
                EditAction::make()->route('traffic-supplier.edit'),
                DeleteAction::make()->route('traffic-supplier.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make()->route('traffic-supplier.edit'),
                Column::make('url'),
                YesNoColumn::make('is_active'),
                UpdatedAtColumn::make(),
            ])
            ->addBulkActions([
                DeleteBulkAction::make()->permission('traffic-supplier.destroy'),
            ])
            ->addBulkChanges([
                NameBulkChange::make(),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'name',
                    'url',
                    'updated_at',
                    'is_active',
                ]);
            });
    }
}
