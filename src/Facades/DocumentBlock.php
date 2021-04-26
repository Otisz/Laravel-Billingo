<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array index(int $page = 1, int $perPage = 25)
 */
class DocumentBlock extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'billingo.document-block';
    }
}
