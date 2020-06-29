<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Products
{
    private $uri = 'products';

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
     * @param  int  $productID
     *
     * @return array
     */
    public function show(int $productID): array
    {
        return Billingo::get("{$this->uri}/{$productID}");
    }

    /**
     * @param  int  $productID
     * @param  array  $payload
     *
     * @return array
     */
    public function update(int $productID, array $payload): array
    {
        return Billingo::put("{$this->uri}/{$productID}", $payload);
    }

    /**
     * @param  int  $productID
     */
    public function destroy(int $productID): void
    {
        Billingo::delete("{$this->uri}/{$productID}");
    }
}
