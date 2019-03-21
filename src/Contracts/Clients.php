<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Contracts;

/**
 * Class Clientable
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Billingo\Contracts
 */
interface Clients
{
    /**
     * Get a listing of clients
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/clients/#list-of-clients
     *
     * @param int $page Show the given page
     * @param int $maxPerPage Sets the maximum number of results to return. Absolute maximum is 50!
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Billingo\API\Connector\Exceptions\JSONParseException
     * @throws \Billingo\API\Connector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\TooManyResourcePerPageException
     */
    public static function all(int $page = 1, int $maxPerPage = 20);

    /**
     * Create a new client
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/clients/#create-a-client
     *
     * @param array $clientPayload Information about the new client
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Billingo\API\Connector\Exceptions\JSONParseException
     * @throws \Billingo\API\Connector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function create(array $clientPayload);

    /**
     * Find a specific client
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/clients/#list-of-clients
     *
     * @param int|string $clientId Client id provided by Billingo
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Billingo\API\Connector\Exceptions\JSONParseException
     * @throws \Billingo\API\Connector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function find($clientId);

    /**
     * Update a specified client
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/clients/#update-a-client
     *
     * @param int|string $clientId Client id provided by Billingo
     * @param array $clientPayload Information about the new client
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Billingo\API\Connector\Exceptions\JSONParseException
     * @throws \Billingo\API\Connector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function update($clientId, array $clientPayload);

    /**
     * Delete an existing client
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/clients/#delete-client
     *
     * @param int|string $clientId Client id provided by Billingo
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Billingo\API\Connector\Exceptions\JSONParseException
     * @throws \Billingo\API\Connector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function destroy($clientId);
}
