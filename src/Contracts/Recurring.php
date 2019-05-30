<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Contracts;

/**
 * Interface Recurring
 *
 * @package Otisz\Billingo\Contracts
 */
interface Recurring
{
    /**
     * Get a listing of my recurring profile(s)
     *
     * @example https://billingo.readthedocs.io/en/latest/recurring/#show-my-recurring-profiles
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
     * Create a new recurring profile
     *
     * @example https://billingo.readthedocs.io/en/latest/recurring/#create-a-new-recurring-profile
     *
     * @param array $recurringPayload Information about the new recurring profile
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function create(array $recurringPayload);

    /**
     * Find a specific recurring profile
     *
     * @example https://billingo.readthedocs.io/en/latest/recurring/#show-my-recurring-profiles
     *
     * @param int $recurringId Recurring id provided by Billingo
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function find(int $recurringId);

    /**
     * Update a specified recurring profile
     *
     * @example https://billingo.readthedocs.io/en/latest/recurring/#update-a-recurring-profile
     *
     * @param int $recurringId Recurring profile id provided by Billingo
     * @param array $recurringPayload Information about the new recurring profile
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function update(int $recurringId, array $recurringPayload);

    /**
     * Pause an existing recurring profile
     *
     * @example https://billingo.readthedocs.io/en/latest/recurring/#pause-a-recurring-profile
     *
     * @param int $recurringId Recurring profile id provided by Billingo
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function pause(int $recurringId);

    /**
     * Resume an existing recurring profile
     *
     * @example https://billingo.readthedocs.io/en/latest/recurring/#resume-a-recurring-profile
     *
     * @param int $recurringId Recurring profile id provided by Billingo
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function resume(int $recurringId);
}
