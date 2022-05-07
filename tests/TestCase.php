<?php

namespace Otisz\Billingo\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Otisz\Billingo\LaravelBillingoServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelBillingoServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('services.billingo.api_key', env('BILLINGO_API_KEY'));
    }
}
