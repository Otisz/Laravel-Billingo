<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Billingo
 *
 * @package Otisz\Billingo\Facades
 *
 * @method static mixed|\Psr\Http\Message\ResponseInterface get(string $uri, array $payload = [])
 * @method static mixed|\Psr\Http\Message\ResponseInterface post(string $uri, array $payload = [])
 * @method static mixed|\Psr\Http\Message\ResponseInterface put(string $uri, array $payload = [])
 * @method static mixed|\Psr\Http\Message\ResponseInterface delete(string $uri, array $payload = [])
 * @method static \Otisz\Billingo\Connector\Connector connector()
 * @method static \Otisz\Billingo\Services\Clients clients()
 * @method static \Otisz\Billingo\Services\Invoices invoices()
 * @method static \Otisz\Billingo\Services\Products products()
 * @method static \Otisz\Billingo\Services\BankAccounts bankAccounts()
 * @method static \Otisz\Billingo\Services\Currency currency()
 * @method static \Otisz\Billingo\Services\Expenses expenses()
 * @method static \Otisz\Billingo\Services\PaymentMethods paymentMethods()
 * @method static \Otisz\Billingo\Services\Recurring recurring()
 * @method static \Otisz\Billingo\Services\Vat vat()
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
