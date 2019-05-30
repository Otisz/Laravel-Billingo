<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Contracts;

/**
 * Interface Products
 *
 * @package Otisz\Billingo\Contracts
 */
interface Products
{
    /**
     * Get a listing of products
     *
     * @example https://billingo.readthedocs.io/en/latest/products/#list-of-products
     *
     * @param int $page Show the given page
     * @param int $maxPerPage Sets the maximum number of results to return. Absolute maximum is 50!
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function all(int $page = 1, int $maxPerPage = 20);

    /**
     * Create a new product
     *
     * @example https://billingo.readthedocs.io/en/latest/products/#create-product
     *
     * @param array $productPayload Information about the new product
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function create(array $productPayload);

    /**
     * Find a specific product
     *
     * @example https://billingo.readthedocs.io/en/latest/products/#list-of-products
     *
     * @param int $productId Product id provided by Billingo
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function find(int $productId);

    /**
     * Update a specified product
     *
     * @example https://billingo.readthedocs.io/en/latest/products/#update-product
     *
     * @param int $productId Product id provided by Billingo
     * @param array $productPayload Information about the new product
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function update(int $productId, array $productPayload);

    /**
     * Delete an existing product
     *
     * @example https://billingo.readthedocs.io/en/latest/products/#delete-product
     *
     * @param int $productId Product id provided by Billingo
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function destroy(int $productId);
}
