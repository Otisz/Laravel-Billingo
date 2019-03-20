<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Contracts;

use Psr\Http\Message\ResponseInterface;

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
     * Filter invoices by queries
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/query/
     *
     * @param array $filters
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function query(array $filters): ResponseInterface;
    
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
     * @return \Psr\Http\Message\ResponseInterface
     *
     * @throws \Otisz\Billingo\Exceptions\TooManyResourcePerPageException
     */
    public static function all(int $page = 1, int $maxPerPage = 20): ResponseInterface;

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
     */
    public static function create(array $clientPayload): ResponseInterface;

    /**
     * Find a specific client
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/clients/#list-of-clients
     *
     * @param int|string $clientId Client id provided by Billingo
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function show($clientId): ResponseInterface;

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
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function update($clientId, array $clientPayload): ResponseInterface;

    /**
     * Delete an existing client
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/clients/#delete-client
     *
     * @param int|string $clientId Client id provided by Billingo
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function destroy($clientId): ResponseInterface;
}
