<?php

namespace WTroiano\TrafficSupplier;

use Botble\PluginManagement\Abstracts\PluginOperationAbstract;
use Illuminate\Support\Facades\Schema;

class Plugin extends PluginOperationAbstract
{
    public static function remove(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('sc_traffic_suppliers');
        Schema::dropIfExists('sc_traffic_suppliers_translations');
    }
}
