<?php

namespace Otisz\Billingo;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Otisz\Billingo\Services\Products;

class LaravelBillingoServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $key = 'config.services.billingo.api_key';
        $this->app->singleton('billingo.products', fn ($app) => new Products(Arr::get($app, $key)));
    }

    public function provides(): array
    {
        return [Products::class];
    }
}
