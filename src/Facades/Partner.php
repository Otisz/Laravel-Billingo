<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array index(int $page = 1, int $perPage = 25)
 * @method static array store(array $payload)
 * @method static array show(int|string $partnerID)
 * @method static array update(int|string $partnerID, array $payload)
 * @method static array destroy(int|string $partnerID)
 */
class Partner extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'billingo.partner';
    }
}
