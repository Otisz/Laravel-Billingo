<?php

namespace Otisz\Billingo;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class BillingoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $configPath = __DIR__.'/../config/billingo.php';

        $this->publishes([
            $configPath => $this->app->configPath('billingo.php'),
        ], 'config');

        $this->mergeConfigFrom($configPath, 'billingo');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind('billingo', static function (Application $app) {
            $config = $app['config']['billingo'];

            return new Billingo(
                new Gateway($config['public_key'], $config['private_key'])
            );
        });

        $this->app->alias('billingo', Billingo::class);
    }
}
