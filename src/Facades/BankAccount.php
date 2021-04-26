<?php

namespace Otisz\Billingo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array index(int $page = 1, int $perPage = 25)
 * @method static array store(array $payload)
 * @method static array show(int|string $bankAccountID)
 * @method static array update(int|string $bankAccountID, array $payload)
 * @method static array destroy(int|string $bankAccountID)
 */
class BankAccount extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'billingo.bank-account';
    }
}
