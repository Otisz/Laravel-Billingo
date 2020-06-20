<?php

namespace Otisz\Billingo\Tests;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\WithFaker;
use Orchestra\Testbench\TestCase as Orchestra;
use Otisz\Billingo\BillingoServiceProvider;
use Otisz\Billingo\Facades\Billingo;

abstract class TestCase extends Orchestra
{
    use WithFaker;

    /**
     * Create a Faker instance for the given locale.
     *
     * @param  string|null  $locale
     * @return \Faker\Generator
     */
    protected function makeFaker($locale = null)
    {
        $locale = 'hu_HU';

        if (isset($this->app) && $this->app->bound(Generator::class)) {
            return $this->app->make(Generator::class, ['locale' => $locale]);
        }

        return Factory::create($locale);
    }

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