<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Contracts;

use Otisz\Billingo\Connector\Connector;

/**
 * Interface Billable
 *
 * @package Otisz\Billingo\Contracts
 */
interface Billable
{
    /**
     * @return \Otisz\Billingo\Connector\Connector
     */
    public function connector(): Connector;

    /**
     * @param string $uri
     * @param array $payload
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function get(string $uri, array $payload = []);

    /**
     * @param string $uri
     * @param array $payload
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function post(string $uri, array $payload = []);

    /**
     * @param string $uri
     * @param array $payload
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function put(string $uri, array $payload = []);

    /**
     * @param string $uri
     * @param array $payload
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function delete(string $uri, array $payload = []);
}
