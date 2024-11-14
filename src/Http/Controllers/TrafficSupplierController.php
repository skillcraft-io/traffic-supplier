<?php

namespace WTroiano\TrafficSupplier\Http\Controllers;

use Botble\Base\Http\Actions\DeleteResourceAction;
use Botble\Base\Http\Controllers\BaseController;
use WTroiano\TrafficSupplier\Forms\TrafficSupplierForm;
use WTroiano\TrafficSupplier\Http\Requests\TrafficSupplierRequest;
use WTroiano\TrafficSupplier\Models\TrafficSupplier;
use WTroiano\TrafficSupplier\Tables\TrafficSupplierTable;

class TrafficSupplierController extends BaseController
{
    public function __construct()
    {
        $this
            ->breadcrumb()
            ->add(trans(trans('plugins/wt-traffic-supplier::traffic-supplier.name')), route('traffic-supplier.index'));
    }

    public function index(TrafficSupplierTable $table)
    {
        $this->pageTitle(trans('plugins/wt-traffic-supplier::traffic-supplier.name'));

        return $table->renderTable();
    }

    public function store(TrafficSupplierRequest $request)
    {
        $form = TrafficSupplierForm::create()->setRequest($request);

        $form->save();

        return $this
            ->httpResponse()
            ->setPreviousUrl(route('traffic-supplier.index'))
            ->setNextUrl(route('traffic-supplier.edit', $form->getModel()->getKey()))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function create()
    {
        $this->pageTitle(trans('plugins/wt-traffic-supplier::traffic-supplier.create'));

        return TrafficSupplierForm::create()->renderForm();
    }

    public function edit(TrafficSupplier $trafficSupplier)
    {
        $this->pageTitle(trans('core/base::forms.edit_item', ['name' => $trafficSupplier->name]));

        return TrafficSupplierForm::createFromModel($trafficSupplier)->renderForm();
    }

    public function update(TrafficSupplier $trafficSupplier, TrafficSupplierRequest $request)
    {
        TrafficSupplierForm::createFromModel($trafficSupplier)
            ->setRequest($request)
            ->save();

        return $this
            ->httpResponse()
            ->setPreviousUrl(route('traffic-supplier.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(TrafficSupplier $trafficSupplier)
    {
        return DeleteResourceAction::make($trafficSupplier);
    }
}
