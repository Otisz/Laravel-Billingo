<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Products
{
    /**
     * Get a listing of products
     *
     * @example https://billingo.readthedocs.io/en/latest/products/#list-of-products
     *
     * @param  int  $page  Show the given page
     * @param  int  $maxPerPage  Sets the maximum number of results to return. Absolute maximum is 50!
     *
     * @return array
     */
    public function all(int $page = 1, int $maxPerPage = 20): array
    {
        if ($maxPerPage > 50) {
            $maxPerPage = 50;
        }

        $options = [
            'page' => $page,
            'max_per_page' => $maxPerPage,
        ];

        return Billingo::get('products', $options);
    }

    /**
     * Create a new product
     *
     * @example https://billingo.readthedocs.io/en/latest/products/#create-product
     *
     * @param  array  $productPayload  Information about the new product
     *
     * @return array
     */
    public function create(array $productPayload): array
    {
        return Billingo::post('products', $productPayload);
    }

    /**
     * Find a specific product
     *
     * @example https://billingo.readthedocs.io/en/latest/products/#list-of-products
     *
     * @param  int|string  $productId  Product id provided by Billingo
     *
     * @return array
     */
    public function find($productId): array
    {
        return Billingo::get("products/{$productId}");
    }

    /**
     * Update a specified product
     *
     * @example https://billingo.readthedocs.io/en/latest/products/#update-product
     *
     * @param  int|string  $productId  Product id provided by Billingo
     * @param  array  $productPayload  Information about the new product
     *
     * @return array
     */
    public function update($productId, array $productPayload): array
    {
        return Billingo::put("products/{$productId}", $productPayload);
    }

    /**
     * Delete an existing product
     *
     * @example https://billingo.readthedocs.io/en/latest/products/#delete-product
     *
     * @param  int|string  $productId  Product id provided by Billingo
     *
     * @return array
     */
    public function destroy($productId): array
    {
        return Billingo::delete("products/{$productId}");
    }
}
