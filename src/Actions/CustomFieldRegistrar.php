<?php

namespace WTroiano\TrafficSupplier\Actions;

use Botble\CustomField\Facades\CustomField;
use WTroiano\TrafficSupplier\Models\TrafficSupplier;

class CustomFieldRegistrar
{
    /**
     * If custom field plugins is available, register
     * to allow custom fields for extendability.
     *
     * @return void
     */
    public function handle(): void
    {
        if (defined('CUSTOM_FIELD_MODULE_SCREEN_NAME')) {
            CustomField::registerModule(TrafficSupplier::class)
                ->registerRule('basic', __('Traffic Supplier'), TrafficSupplier::class, function () {
                    return app()->make(TrafficSupplier::class)->query()->pluck('name', 'id');
                })
                ->expandRule('other', 'Model', 'model_name', function () {
                    return [
                        TrafficSupplier::class => __('Traffic Supplier'),
                    ];
                });
        }
    }
}
