<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Product
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

        return Billingo::get('products', [
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
        return Billingo::post('products', $payload);
    }

    /**
     * @param  int|string  $productID
     *
     * @return array
     */
    public function show($productID): array
    {
        return Billingo::get("products/{$productID}");
    }

    /**
     * @param  int|string  $productID
     * @param  array  $payload
     *
     * @return array
     */
    public function update($productID, array $payload): array
    {
        return Billingo::put("products/{$productID}", $payload);
    }

    /**
     * @param  int|string  $productID
     *
     * @return array
     */
    public function destroy($productID): array
    {
        return Billingo::delete("products/{$productID}");
    }
}
