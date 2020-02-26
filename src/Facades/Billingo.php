<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;
use Otisz\Billingo\Gateway;
use Otisz\Billingo\Services\BankAccounts;
use Otisz\Billingo\Services\Clients;
use Otisz\Billingo\Services\Currency;
use Otisz\Billingo\Services\Expenses;
use Otisz\Billingo\Services\Invoices;
use Otisz\Billingo\Services\PaymentMethods;
use Otisz\Billingo\Services\Products;
use Otisz\Billingo\Services\Recurring;
use Otisz\Billingo\Services\Vat;

/**
 * @method static array get(string $uri, array $payload = [])
 * @method static array post(string $uri, array $payload = [])
 * @method static array put(string $uri, array $payload = [])
 * @method static array delete(string $uri, array $payload = [])
 * @method static Gateway gateway()
 * @method static Clients clients()
 * @method static Invoices invoices()
 * @method static Products products()
 * @method static BankAccounts bankAccounts()
 * @method static Currency currency()
 * @method static Expenses expenses()
 * @method static PaymentMethods paymentMethods()
 * @method static Recurring recurring()
 * @method static Vat vat()
 */
class Billingo extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor(): string
    {
        return 'billingo';
    }
}
