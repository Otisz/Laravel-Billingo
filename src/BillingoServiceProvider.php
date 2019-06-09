<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo;

use Illuminate\Support\ServiceProvider;
use Otisz\Billingo\Connector\Connector;

/**
 * Class BillingoServiceProvider
 *
 * @package Otisz\Billingo
 */
class BillingoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/billingo.php' => config_path('billingo.php'),
        ], 'config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/billingo.php', 'billingo');

        $this->app->bind('billingo', static function () {
            $connector = new Connector([
                'public_key' => config('billingo.public_key'),
                'private_key' => config('billingo.private_key'),
            ]);

            return new Billingo($connector);
        });

        $this->app->alias('billingo', Billingo::class);
    }
}
