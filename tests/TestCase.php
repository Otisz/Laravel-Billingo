<?php

namespace Otisz\Billingo\Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Orchestra\Testbench\TestCase as Orchestra;
use Otisz\Billingo\BillingoServiceProvider;
use Otisz\Billingo\Facades\Billingo;

abstract class TestCase extends Orchestra
{
    use WithFaker;

    /**
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            BillingoServiceProvider::class,
        ];
    }

    /**
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageAliases($app): array
    {
        return [
            'billingo' => Billingo::class,
        ];
    }
}