<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Builders\ProductBuilder;
use Otisz\Billingo\Gateway;

class Products extends Gateway
{
    /**
     * Returns a list of your products.
     * The partners are returned sorted by creation date, with the most recent partners appearing first.
     *
     * @param  int  $page
     * @param  int  $perPage
     * @param  string|null  $query
     * @return array
     */
    public function index(int $page = 1, int $perPage = 25, string $query = null): array
    {
        if ($perPage > 100 || $perPage < 1) {
            $perPage = 25;
        }

        return $this->httpGet('products', array_filter([
            'page' => $page,
            'per_page' => $perPage,
            'query' => $query,
        ]));
    }

    /**
     * Create a new product. Returns a product object if the creation is succeeded.
     *
     * @param  \Otisz\Billingo\Builders\ProductBuilder  $builder
     * @return array
     * @throws \Otisz\Billingo\Exceptions\InvalidProductException
     */
    public function store(ProductBuilder $builder): array
    {
        $builder->validate();

        return $this->httpPost('products', $builder->toArray());
    }

    /**
     * Retrieves the details of an existing product.
     *
     * @param  int  $id
     * @return array
     */
    public function show(int $id): array
    {
        return $this->httpGet("products/$id");
    }

    /**
     * Update an existing product. Returns a product object if the update is succeeded.
     *
     * @param  int  $id
     * @param  \Otisz\Billingo\Builders\ProductBuilder  $builder
     * @return array
     * @throws \Otisz\Billingo\Exceptions\InvalidProductException
     */
    public function update(int $id, ProductBuilder $builder): array
    {
        $builder->validate();

        return $this->httpPut("products/$id", $builder->toArray());
    }

    /**
     * Delete an existing product.
     *
     * @param  int  $id
     * @return array
     */
    public function delete(int $id): array
    {
        return $this->httpDelete("products/$id");
    }
}
