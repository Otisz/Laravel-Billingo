<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Abstracts;

use Billingo\API\Connector\Exceptions\JSONParseException;
use Billingo\API\Connector\Exceptions\RequestErrorException;
use Billingo\API\Connector\HTTP\Request;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class BillinGoblin
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Billingo\Abstracts
 *
 * TODO: Find better name for this class
 */
abstract class BillinGoblin
{
    /**
     * @var \Billingo\API\Connector\HTTP\Request
     */
    private static $connector;

    /**
     * BillinGoblin constructor.
     *
     * @param \Billingo\API\Connector\HTTP\Request $connector
     */
    public function __construct(Request $connector)
    {
        self::$connector = $connector;
    }

    /**
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @return \Billingo\API\Connector\HTTP\Request
     */
    protected static function connector(): Request
    {
        return self::$connector;
    }

    /**
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @param string $uri
     * @param array $data
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public static function get(string $uri, array $data = [])
    {
        try {
            return self::connector()->get($uri, $data);
        } catch (JSONParseException $e) {
            //
        } catch (RequestErrorException $e) {
            //
        } catch (GuzzleException $e) {
            //
        }
    }

    /**
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @param string $uri
     * @param array $data
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public static function post(string $uri, array $data = [])
    {
        try {
            return self::connector()->post($uri, $data);
        } catch (JSONParseException $e) {
            //
        } catch (RequestErrorException $e) {
            //
        } catch (GuzzleException $e) {
            //
        }
    }

    /**
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @param string $uri
     * @param array $data
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public static function put(string $uri, array $data = [])
    {
        try {
            return self::connector()->put($uri, $data);
        } catch (JSONParseException $e) {
            //
        } catch (RequestErrorException $e) {
            //
        } catch (GuzzleException $e) {
            //
        }
    }

    /**
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @param string $uri
     * @param array $data
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public static function delete(string $uri, array $data = [])
    {
        try {
            return self::connector()->delete($uri, $data);
        } catch (JSONParseException $e) {
            //
        } catch (RequestErrorException $e) {
            //
        } catch (GuzzleException $e) {
            //
        }
    }
}
