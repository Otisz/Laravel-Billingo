<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo;

use Otisz\BillingoConnector\HTTP\Request as BillingoConnector;
use Otisz\Billingo\Contracts\Billingo as BillingoContract;
use Otisz\BillingoConnector\HTTP\Request;

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
     * @var \Otisz\BillingoConnector\HTTP\Request $connector
     */
    private static $connector;

    /**
     * Billingo constructor.
     *
     * @param \Otisz\BillingoConnector\HTTP\Request $connector
     */
    public function __construct(BillingoConnector $connector)
    {
        self::$connector = $connector;
    }

    /**
     * @inheritDoc
     */
    public static function connector(): Request
    {
        return self::$connector;
    }

    /**
     * @inheritDoc
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
