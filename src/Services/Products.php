<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Products
{
    /**
     * @param  array  $payload
     *
     * @return array
     */
    public function index(array $payload = []): array
    {
        return Billingo::get('products', $payload);
    }

    /**
     * @param  array  $payload
     *
     * @return array
     */
    public function store(array $payload): array
    {
        return Billingo::post('products', $payload);
    }

    /**
     * @param  int  $productID
     *
     * @return array
     */
    public function show(int $productID): array
    {
        return Billingo::get("products/{$productID}");
    }

    /**
     * @param  int  $productID
     * @param  array  $payload
     *
     * @return array
     */
    public function update(int $productID, array $payload): array
    {
        return Billingo::put("products/{$productID}", $payload);
    }

    /**
     * @param  int  $productID
     */
    public function destroy(int $productID): void
    {
        Billingo::delete("products/{$productID}");
    }
}
