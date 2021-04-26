<?php

namespace Otisz\Billingo\Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Orchestra\Testbench\TestCase as Orchestra;
use Otisz\Billingo\BillingoServiceProvider;

abstract class TestCase extends Orchestra
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        self::markTestSkipped('Tests are disabled until i will have subscription');
    }

    protected function setUpFaker()
    {
        $this->faker = $this->makeFaker('hu_HU');
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

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('services.billingo.api_key', env('BILLINGO_API_KEY'));
    }
}
