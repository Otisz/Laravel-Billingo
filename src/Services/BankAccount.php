<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

/**
 * This service is untested.
 * Currently i don't have permission to use those endpoints.
 * If you have any issue, feel free to open an issue on GitHub.
 */
class BankAccount
{
    /**
     * @param  int  $page
     * @param  int  $perPage
     *
     * @return array
     */
    public function index(int $page = 1, int $perPage = 25): array
    {
        if ($perPage > 100 || $perPage < 1) {
            $perPage = 25;
        }

        return Billingo::get('bank-accounts', [
            'page' => $page,
            'per_page' => $perPage,
        ]);
    }

    /**
     * @param  array  $payload
     *
     * @return array
     */
    public function store(array $payload): array
    {
        return Billingo::post('bank-accounts', $payload);
    }

    /**
     * @param  int|string  $bankAccountID
     *
     * @return array
     */
    public function show($bankAccountID): array
    {
        return Billingo::get("bank-accounts/{$bankAccountID}");
    }

    /**
     * @param  int|string  $bankAccountID
     * @param  array  $payload
     *
     * @return array
     */
    public function update($bankAccountID, array $payload): array
    {
        return Billingo::put("bank-accounts/{$bankAccountID}", $payload);
    }

    /**
     * @param  int|string  $bankAccountID
     *
     * @return array
     */
    public function destroy($bankAccountID): array
    {
        return Billingo::delete("bank-accounts/{$bankAccountID}");
    }
}
