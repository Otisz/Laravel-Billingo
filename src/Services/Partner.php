<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Partner
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

        return Billingo::get('partners', [
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
        return Billingo::post('partners', $payload);
    }

    /**
     * @param  int|string  $partnerID
     *
     * @return array
     */
    public function show($partnerID): array
    {
        return Billingo::get("partners/{$partnerID}");
    }

    /**
     * @param  int|string  $partnerID
     * @param  array  $payload
     *
     * @return array
     */
    public function update($partnerID, array $payload): array
    {
        return Billingo::put("partners/{$partnerID}", $payload);
    }

    /**
     * @param  int|string  $partnerID
     *
     * @return array
     */
    public function destroy($partnerID): array
    {
        return Billingo::delete("partners/{$partnerID}");
    }
}
