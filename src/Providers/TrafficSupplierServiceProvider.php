<?php

namespace WTroiano\TrafficSupplier\Providers;

use Botble\Base\Facades\DashboardMenu;
use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\LanguageAdvanced\Supports\LanguageAdvancedManager;
use WTroiano\TrafficSupplier\Actions\CustomFieldRegistrar;
use WTroiano\TrafficSupplier\Actions\RevisionRegistrar;
use WTroiano\TrafficSupplier\Models\TrafficSupplier;

class TrafficSupplierServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/wt-traffic-supplier')
            ->loadHelpers()
            ->loadAndPublishConfigurations(['permissions'])
            ->loadAndPublishTranslations()
            ->loadRoutes()
            ->loadAndPublishViews()
            ->loadMigrations();

            if (defined('LANGUAGE_ADVANCED_MODULE_SCREEN_NAME')) {
                LanguageAdvancedManager::registerModule(TrafficSupplier::class, [
                    'name',
                ]);
            }

            DashboardMenu::default()->beforeRetrieving(function () {
                DashboardMenu::registerItem([
                    'id' => 'cms-plugins-traffic supplier',
                    'priority' => 5,
                    'parent_id' => null,
                    'name' => 'plugins/wt-traffic-supplier::traffic-supplier.name',
                    'icon' => 'ti ti-box',
                    'url' => route('traffic-supplier.index'),
                    'permissions' => ['traffic-supplier.index'],
                ]);
            });

            $this->app->booted(function(){
                (new RevisionRegistrar())->handle();
                (new CustomFieldRegistrar())->handle();
            });
    }
}
