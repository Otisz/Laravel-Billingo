<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array index(int $page = 1, int $perPage = 25)
 * @method static array store(array $payload)
 * @method static array show(int|string $spendingID)
 * @method static array update(int|string $spendingID, array $payload)
 * @method static array destroy(int|string $spendingID)
 */
class Spending extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'billingo.spending';
    }
}
