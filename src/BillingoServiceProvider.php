<?php

namespace Otisz\Billingo;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class BillingoServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton('billingo', static function (Application $app) {
            return new Billingo($app['config']['billingo']['api_key']);
        });

        $this->app->alias('billingo', Billingo::class);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $packageConfigPath = __DIR__.'/../config/billingo.php';
        $publishedConfigPath = $this->app->configPath('billingo.php');

        $this->publishes([$packageConfigPath => $publishedConfigPath], 'billingo');

        $this->mergeConfigFrom($packageConfigPath, 'billingo');
    }
}
