<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo;

use Billingo\API\Connector\HTTP\Request as BillingoConnector;
use Otisz\Billingo\Contracts\Billingo as BillingoContract;

/**
 * Class Billingo
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Billingo
 */
class Billingo implements BillingoContract
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
    public function __construct(BillingoConnector $connector)
    {
        self::$connector = $connector;
    }

    /**
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @return \Billingo\API\Connector\HTTP\Request
     */
    public static function connector()
    {
        return self::$connector;
    }

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
    public static function get(string $uri, array $payload = [])
    {
        return self::$connector->get($uri, $payload);
    }

    /**
     * @inheritdoc
     */
    public static function post(string $uri, array $payload = [])
    {
        return self::$connector->post($uri, $payload);
    }

    /**
     * @inheritdoc
     */
    public static function put(string $uri, array $payload = [])
    {
        return self::$connector->put($uri, $payload);
    }

    /**
     * @inheritdoc
     */
    public static function delete(string $uri, array $payload = [])
    {
        return self::$connector->delete($uri, $payload);
    }
}
