<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Contracts\BankAccounts as Contract;
use Otisz\Billingo\Facades\Billingo;

/**
 * Class BankAccounts
 *
 * @package Otisz\Billingo\Services
 */
class BankAccounts implements Contract
{
    /**
     * @inheritdoc
     */
    public function all()
    {
        return Billingo::get('bank_accounts');
    }

    /**
     * @inheritDoc
     */
    public function create(array $bankAccountPayload)
    {
        return Billingo::post('bank_accounts', $bankAccountPayload);
    }

    /**
     * @inheritDoc
     */
    public function find(int $bankAccountId)
    {
        return Billingo::get("bank_accounts/{$bankAccountId}");
    }

    /**
     * @inheritDoc
     */
    public function update(int $bankAccountId, array $bankAccountPayload)
    {
        return Billingo::put("bank_accounts/{$bankAccountId}", $bankAccountPayload);
    }
}
