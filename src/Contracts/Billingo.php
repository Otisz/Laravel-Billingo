<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Contracts;

use Otisz\BillingoConnector\HTTP\Request;

/**
 * Interface Billingo
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
     * @return \Otisz\BillingoConnector\HTTP\Request
     */
    public static function connector(): Request;
    
    /**
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @param string $uri
     * @param array $payload
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Otisz\BillingoConnector\Exceptions\JSONParseException
     * @throws \Otisz\BillingoConnector\Exceptions\RequestErrorException
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
     * @throws \Otisz\BillingoConnector\Exceptions\JSONParseException
     * @throws \Otisz\BillingoConnector\Exceptions\RequestErrorException
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
     * @throws \Otisz\BillingoConnector\Exceptions\JSONParseException
     * @throws \Otisz\BillingoConnector\Exceptions\RequestErrorException
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
     * @throws \Otisz\BillingoConnector\Exceptions\JSONParseException
     * @throws \Otisz\BillingoConnector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function delete(string $uri, array $payload = []);
}
