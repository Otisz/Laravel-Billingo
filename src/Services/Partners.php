<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Partners
{
    /**
     * @param  array  $payload
     *
     * @return array
     */
    public function index(array $payload = []): array
    {
        return Billingo::get('partners', $payload);
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
     * @param  int  $partnerID
     *
     * @return array
     */
    public function show(int $partnerID): array
    {
        return Billingo::get("partners/{$partnerID}");
    }

    /**
     * @param  int  $partnerID
     * @param  array  $payload
     *
     * @return array
     */
    public function update(int $partnerID, array $payload): array
    {
        return Billingo::put("partners/{$partnerID}", $payload);
    }

    /**
     * @param  int  $partnerID
     */
    public function destroy(int $partnerID): void
    {
        Billingo::delete("partners/{$partnerID}");
    }
}
