<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array export()
 * @method static \Illuminate\Http\Client\Response download(int|string $exportID)
 * @method static array poll(int|string $exportID)
 */
class DocumentExport extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'billingo.document-export';
    }
}
