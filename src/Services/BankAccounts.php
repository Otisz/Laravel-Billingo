<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class BankAccounts
{
    /**
     * Get a listing of bank accounts
     *
     * @example https://billingo.readthedocs.io/en/latest/bank_accounts/#list-bank-accounts
     *
     * @return array
     */
    public function all(): array
    {
        return Billingo::get('bank_accounts');
    }

    /**
     * Create a new bank account
     *
     * @example https://billingo.readthedocs.io/en/latest/bank_accounts/#create-bank-account-object
     *
     * @param  array  $bankAccountPayload  Information about the new bank account
     *
     * @return array
     */
    public function create(array $bankAccountPayload): array
    {
        return Billingo::post('bank_accounts', $bankAccountPayload);
    }

    /**
     * Find a specific bank account
     *
     * @example https://billingo.readthedocs.io/en/latest/bank_accounts/#list-bank-accounts
     *
     * @param  int|string  $bankAccountId  Bank account id provided by Billingo
     *
     * @return array
     */
    public function find($bankAccountId): array
    {
        return Billingo::get("bank_accounts/{$bankAccountId}");
    }

    /**
     * Update a specified bank account
     *
     * @example https://billingo.readthedocs.io/en/latest/bank_accounts/#update-bank-accounts-object
     *
     * @param  int|string  $bankAccountId  Bank account id provided by Billingo
     * @param  array  $bankAccountPayload  Information about the new bank account
     *
     * @return array
     */
    public function update($bankAccountId, array $bankAccountPayload): array
    {
        return Billingo::put("bank_accounts/{$bankAccountId}", $bankAccountPayload);
    }
}
