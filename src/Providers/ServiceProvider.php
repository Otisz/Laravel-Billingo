<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Providers;

use Billingo\API\Connector\HTTP\Request as BillingoConnector;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Otisz\Billingo\Billingo;
use Otisz\Billingo\Services\Clients;

/**
 * Class ServiceProvider
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Billingo\Providers
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/billingo.php' => config_path('billingo.php'),
        ], 'billingo');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/billingo.php', 'billingo');

        $this->app->singleton(BillingoConnector::class, function () {
            return new BillingoConnector([
                'public_key' => config('billingo.public_key'),
                'private_key' => config('billingo.private_key'),
            ]);
        });

        $this->registerServices();

        $this->app->bind(Billingo::class, function ($app) {
            return new Billingo($app[BillingoConnector::class]);
        });
        
        $this->app->alias(Billingo::class, 'billingo');
    }

    /**
     * @author Levente Otta <leventeotta@gmail.com>
     */
    private function registerServices(): void
    {
        $this->app->bind(Clients::class, function ($app) {
            return new Clients($app[BillingoConnector::class]);
        });
    }
}
