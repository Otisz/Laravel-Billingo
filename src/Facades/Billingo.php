<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Otisz\Billingo\Billingo
 */
class Billingo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-billingo';
    }
}
