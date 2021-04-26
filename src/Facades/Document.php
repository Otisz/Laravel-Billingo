<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array index(int $page = 1, int $perPage = 25, array $payload = [])
 * @method static array store(array $payload)
 * @method static array show(int|string $documentID)
 * @method static array destroy(int|string $documentID)
 * @method static array archive(int|string $documentID)
 * @method static array cancel(int|string $documentID)
 * @method static array copy(int|string $documentID)
 * @method static array createFromProforma(int|string $documentID)
 * @method static array createModificationDocument(int|string $documentID)
 * @method static \Illuminate\Http\Client\Response download(int|string $documentID)
 * @method static array onlineSzamla(int|string $documentID)
 * @method static array payments(int|string $documentID)
 * @method static array updatePayments(int|string $documentID)
 * @method static array deletePayments(int|string $documentID)
 * @method static array publicURL(int|string $documentID)
 * @method static array send(int|string $documentID)
 */
class Document extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'billingo.document';
    }
}
