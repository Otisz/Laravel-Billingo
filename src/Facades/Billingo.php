<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array get(string $uri, array $payload = [])
 * @method static array post(string $uri, array $payload = [])
 * @method static array put(string $uri, array $payload = [])
 * @method static array delete(string $uri, array $payload = [])
 * @method static \Otisz\Billingo\Gateway gateway()
 * @method static \Otisz\Billingo\Services\Partners partners()
 * @method static \Otisz\Billingo\Services\Products products()
 * @method static \Otisz\Billingo\Services\BankAccounts bankAccount()
 * @method static \Otisz\Billingo\Services\Currencies currencies()
 * @method static \Otisz\Billingo\Services\Organization organization()
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
