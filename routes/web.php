<?php

use Botble\Base\Facades\AdminHelper;
use Illuminate\Support\Facades\Route;
use WTroiano\TrafficSupplier\Http\Controllers\TrafficSupplierController;

AdminHelper::registerRoutes(function () {
    Route::group(['prefix' => 'traffic-suppliers', 'as' => 'traffic-supplier.'], function () {
        Route::resource('', TrafficSupplierController::class)->parameters(['' => 'traffic-supplier']);
    });
});
