<?php

namespace Otisz\Billingo;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Otisz\Billingo\Services\BankAccount;
use Otisz\Billingo\Services\Currency;
use Otisz\Billingo\Services\Document;
use Otisz\Billingo\Services\DocumentBlock;
use Otisz\Billingo\Services\DocumentExport;
use Otisz\Billingo\Services\Organization;
use Otisz\Billingo\Services\Partner;
use Otisz\Billingo\Services\Product;
use Otisz\Billingo\Services\Spending;
use Otisz\Billingo\Services\Util;

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
            return new Billingo(
                Arr::get($app, 'config.services.billingo.api_key')
            );
        });

        $this->app->singleton('billingo.bank-account', static function () {
            return new BankAccount();
        });

        $this->app->singleton('billingo.currency', static function () {
            return new Currency();
        });

        $this->app->singleton('billingo.document', static function () {
            return new Document();
        });

        $this->app->singleton('billingo.document-block', static function () {
            return new DocumentBlock();
        });

        $this->app->singleton('billingo.document-export', static function () {
            return new DocumentExport();
        });

        $this->app->singleton('billingo.organization', static function () {
            return new Organization();
        });

        $this->app->singleton('billingo.partner', static function () {
            return new Partner();
        });

        $this->app->singleton('billingo.product', static function () {
            return new Product();
        });

        $this->app->singleton('billingo.spending', static function () {
            return new Spending();
        });

        $this->app->singleton('billingo.util', static function () {
            return new Util();
        });


    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
