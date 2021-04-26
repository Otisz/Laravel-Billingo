<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array conversationRate(string $from, string $to, string|null $date = null)
 */
class Currency extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'billingo.currency';
    }
}
