<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Contracts\Products as Contract;
use Otisz\Billingo\Facades\Billingo;

/**
 * Class Products
 *
 * @package Otisz\Billingo\Services
 */
class Products implements Contract
{
    /**
     * @inheritdoc
     */
    public function all(int $page = 1, int $maxPerPage = 20)
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
     * @inheritDoc
     */
    public function create(array $productPayload)
    {
        return Billingo::post('products', $productPayload);
    }

    /**
     * @inheritDoc
     */
    public function find(int $productId)
    {
        return Billingo::get("products/{$productId}");
    }

    /**
     * @inheritDoc
     */
    public function update(int $productId, array $productPayload)
    {
        return Billingo::put("products/{$productId}", $productPayload);
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $productId)
    {
        return Billingo::delete("products/{$productId}");
    }
}
