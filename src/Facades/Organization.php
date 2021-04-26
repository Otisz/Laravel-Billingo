<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array show()
 */
class Organization extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'billingo.organization';
    }
}
