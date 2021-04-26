<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array checkTaxNumber(string $taxNumber)
 * @method static array convertLegacyId(int|string $id)
 */
class Util extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'billingo.util';
    }
}
