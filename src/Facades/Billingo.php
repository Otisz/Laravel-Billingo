<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array get(string $uri, array $payload = [])
 * @method static array post(string $uri, array $payload = [])
 * @method static array put(string $uri, array $payload = [])
 * @method static array delete(string $uri, array $payload = [])
 * @method static \Illuminate\Http\Client\Response download(string $uri, array $headers = [])
 *
 *
 *
 * @method static array currencyList()
 * @method static array paymentMethods()
 * @method static array paymentStatuses()
 * @method static array vats()
 * @method static array documentStoreTypes()
 * @method static array documentTypes()
 * @method static array documentLanguages()
 * @method static array countryList()
 */
class Billingo extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'billingo';
    }
}
