<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Contracts;

/**
 * Interface Clients
 *
 * @package Otisz\Billingo\Contracts
 */
interface Clients
{
    /**
     * Get a listing of clients
     *
     * @example https://billingo.readthedocs.io/en/latest/clients/#list-of-clients
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
     * Create a new client
     *
     * @example https://billingo.readthedocs.io/en/latest/clients/#create-a-client
     *
     * @param array $clientPayload Information about the new client
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function create(array $clientPayload);

    /**
     * Find a specific client
     *
     * @example https://billingo.readthedocs.io/en/latest/clients/#list-of-clients
     *
     * @param int $clientId Client id provided by Billingo
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function find(int $clientId);

    /**
     * Update a specified client
     *
     * @example https://billingo.readthedocs.io/en/latest/clients/#update-a-client
     *
     * @param int $clientId Client id provided by Billingo
     * @param array $clientPayload Information about the new client
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function update(int $clientId, array $clientPayload);

    /**
     * Delete an existing client
     *
     * @example https://billingo.readthedocs.io/en/latest/clients/#delete-client
     *
     * @param int $clientId Client id provided by Billingo
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function destroy(int $clientId);
}
