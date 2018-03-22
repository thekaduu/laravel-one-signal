<?php

namespace Services\OneSignal;

use Illuminate\Support\ServiceProvider;
use Services\OneSignal\OneSignalService as OneSignal;

class OneSignalProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OneSignal::class, function ($app) {
            return new OneSignal;
        });
    }
}
