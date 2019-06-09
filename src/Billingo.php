<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo;

use Otisz\Billingo\Connector\Connector;
use Otisz\Billingo\Contracts\Billable;
use Otisz\Billingo\Traits\Services;

/**
 * Class Billingo
 *
 * @package Otisz\Billingo
 */
class Billingo implements Billable
{
    use Services;

    /**
     * @var \Otisz\Billingo\Connector\Connector $connector
     */
    private $connector;

    /**
     * Billingo constructor.
     *
     * @param \Otisz\Billingo\Connector\Connector $connector
     */
    public function __construct(Connector $connector)
    {
        $this->connector = $connector;
    }

    /**
     * @inheritDoc
     */
    public function connector(): Connector
    {
        return $this->connector;
    }

    /**
     * @inheritDoc
     */
    public function get(string $uri, array $payload = [])
    {
        return $this->connector->get($uri, $payload);
    }

    /**
     * @inheritdoc
     */
    public function post(string $uri, array $payload = [])
    {
        return $this->connector->post($uri, $payload);
    }

    /**
     * @inheritdoc
     */
    public function put(string $uri, array $payload = [])
    {
        return $this->connector->put($uri, $payload);
    }

    /**
     * @inheritdoc
     */
    public function delete(string $uri, array $payload = [])
    {
        return $this->connector->delete($uri, $payload);
    }
}
