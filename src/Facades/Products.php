<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;
use Otisz\Billingo\Builders\ProductBuilder;

/**
 * @method static array index(int $page = 1, int $perPage = 25, string $query = null)
 * @method static array store(ProductBuilder $builder)
 * @method static array show(int $id)
 * @method static array update(int $id, ProductBuilder $builder)
 * @method static array delete(int $id)
 * @see \Otisz\Billingo\Services\Products
 */
class Products extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'billingo.products';
    }
}
