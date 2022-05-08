<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;
use Otisz\Billingo\Builders\PartnerBuilder;

/**
 * @method static array index(int $page = 1, int $perPage = 25, string $query = null)
 * @method static array store(PartnerBuilder $builder)
 * @method static array show(int $id)
 * @method static array update(int $id, PartnerBuilder $builder)
 * @method static array delete(int $id)
 * @see \Otisz\Billingo\Services\Partners
 */
class Partners extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'billingo.partners';
    }
}
