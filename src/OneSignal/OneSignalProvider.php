<?php

namespace Thekaduu\OneSignal;

use Illuminate\Support\ServiceProvider;
use Thekaduu\OneSignal\OneSignalService as OneSignal;

class OneSignalProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../resources/config/one-signal.php' => config_path('one-signal.php')
        ]);
        $this->mergeConfigFrom(__DIR__ . '/../resources/config/one-signal.php', 'one-signal');
    }

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
