<?php

namespace Otisz\Billingo\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Otisz\Billingo\LaravelBillingoServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelBillingoServiceProvider::class,
        ];
    }
}
