<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Spending
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

        return Billingo::get('spendings', [
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
        return Billingo::post('spendings', $payload);
    }

    /**
     * @param  int|string  $spendingID
     *
     * @return array
     */
    public function show($spendingID): array
    {
        return Billingo::get("spendings/{$spendingID}");
    }

    /**
     * @param  int|string  $spendingID
     * @param  array  $payload
     *
     * @return array
     */
    public function update($spendingID, array $payload): array
    {
        return Billingo::put("spendings/{$spendingID}", $payload);
    }

    /**
     * @param  int|string  $spendingID
     *
     * @return array
     */
    public function destroy($spendingID): array
    {
        return Billingo::delete("spendings/{$spendingID}");
    }
}
