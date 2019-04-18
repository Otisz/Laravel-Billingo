<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo;

use Otisz\BillingoConnector\Connector;
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
     * @var \Otisz\BillingoConnector\Connector $connector
     */
    private static $connector;

    /**
     * Billingo constructor.
     *
     * @param \Otisz\BillingoConnector\Connector $connector
     */
    public function __construct(Connector $connector)
    {
        self::$connector = $connector;
    }

    /**
     * @inheritDoc
     */
    public static function connector(): Connector
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
