<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array get(string $uri, array $payload = [])
 * @method static array post(string $uri, array $payload = [])
 * @method static array put(string $uri, array $payload = [])
 * @method static void delete(string $uri, array $payload = [])
 * @method static array currencyList()
 * @method static array paymentMethods()
 * @method static array paymentStatuses()
 * @method static array vats()
 * @method static array documentStoreTypes()
 * @method static array documentTypes()
 * @method static array documentLanguages()
 * @method static array countryList()
 * @method static \Psr\Http\Message\ResponseInterface download(string $uri)
 * @method static \Otisz\Billingo\Services\Partners partners()
 * @method static \Otisz\Billingo\Services\Products products()
 * @method static \Otisz\Billingo\Services\BankAccounts bankAccount()
 * @method static \Otisz\Billingo\Services\Currencies currencies()
 * @method static \Otisz\Billingo\Services\Organization organization()
 * @method static \Otisz\Billingo\Services\DocumentBlocks documentBlocks()
 * @method static \Otisz\Billingo\Services\Documents documents()
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
