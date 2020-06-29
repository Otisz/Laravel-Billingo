<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Partners
{
    private $uri = 'partners';

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
     * @param  int  $partnerID
     *
     * @return array
     */
    public function show(int $partnerID): array
    {
        return Billingo::get("{$this->uri}/{$partnerID}");
    }

    /**
     * @param  int  $partnerID
     * @param  array  $payload
     *
     * @return array
     */
    public function update(int $partnerID, array $payload): array
    {
        return Billingo::put("{$this->uri}/{$partnerID}", $payload);
    }

    /**
     * @param  int  $partnerID
     */
    public function destroy(int $partnerID): void
    {
        Billingo::delete("{$this->uri}/{$partnerID}");
    }
}
