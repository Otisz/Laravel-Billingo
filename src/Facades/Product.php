<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array index(int $page = 1, int $perPage = 25)
 * @method static array store(array $payload)
 * @method static array show(int|string $productID)
 * @method static array update(int|string $productID, array $payload)
 * @method static array destroy(int|string $productID)
 */
class Product extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'billingo.product';
    }
}
