<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Contracts;

/**
 * Class Billingo
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Billingo\Contracts
 */
interface Billingo
{
    /**
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @return \Billingo\API\Connector\HTTP\Request
     */
    public static function connector();
    
    /**
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @param string $uri
     * @param array $payload
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Billingo\API\Connector\Exceptions\JSONParseException
     * @throws \Billingo\API\Connector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function get(string $uri, array $payload = []);

    /**
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @param string $uri
     * @param array $payload
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Billingo\API\Connector\Exceptions\JSONParseException
     * @throws \Billingo\API\Connector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function post(string $uri, array $payload = []);

    /**
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @param string $uri
     * @param array $payload
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Billingo\API\Connector\Exceptions\JSONParseException
     * @throws \Billingo\API\Connector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function put(string $uri, array $payload = []);

    /**
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @param string $uri
     * @param array $payload
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Billingo\API\Connector\Exceptions\JSONParseException
     * @throws \Billingo\API\Connector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function delete(string $uri, array $payload = []);
}
