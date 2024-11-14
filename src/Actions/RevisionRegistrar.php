<?php

namespace WTroiano\TrafficSupplier\Actions;

use Botble\Revision\Providers\RevisionServiceProvider;
use WTroiano\TrafficSupplier\Models\TrafficSupplier;

class RevisionRegistrar
{
    /**
     * Allow tracking supplier changes through code revision package
     *
     * @return void
     */
    public function handle(): void
    {
        if(class_exists(RevisionServiceProvider::class)){
            config()->set([
                'packages.revision.general.supported' => array_merge(
                    config('packages.revision.general.supported', []),
                    [TrafficSupplier::class]
                )
            ]);
        }
    }
}
