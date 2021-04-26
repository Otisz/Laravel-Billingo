<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array get(string $uri, array $query = null)
 * @method static array post(string $uri, array $payload = [])
 * @method static array put(string $uri, array $payload = [])
 * @method static array delete(string $uri)
 * @method static \Illuminate\Http\Client\Response download(string $uri, array $headers = [])
 */
class Billingo extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'billingo';
    }
}
