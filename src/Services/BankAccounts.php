<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

/**
 * This service is untested.
 * Currently i don't have permission to use those endpoints.
 * If you have any issue, feel free to open an issue on GitHub.
 */
class BankAccounts
{
    private $uri = 'bank-accounts';

    /**
     * @param  array  $payload
     *
     * @return array
     */
    public function index(array $payload = []): array
    {
        return Billingo::get($this->uri, $payload);
    }

    /**
     * @param  array  $payload
     *
     * @return array
     */
    public function store(array $payload): array
    {
        return Billingo::post($this->uri, $payload);
    }

    /**
     * @param  int  $bankAccountID
     *
     * @return array
     */
    public function show(int $bankAccountID): array
    {
        return Billingo::get("{$this->uri}/{$bankAccountID}");
    }

    /**
     * @param  int  $bankAccountID
     * @param  array  $payload
     *
     * @return array
     */
    public function update(int $bankAccountID, array $payload): array
    {
        return Billingo::put("{$this->uri}/{$bankAccountID}", $payload);
    }

    /**
     * @param  int  $bankAccountID
     */
    public function destroy(int $bankAccountID): void
    {
        Billingo::delete("{$this->uri}/{$bankAccountID}");
    }
}
