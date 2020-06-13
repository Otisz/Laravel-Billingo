<?php

namespace Otisz\Billingo;

class Billingo
{
    /**
     * @var \Otisz\Billingo\Gateway
     */
    protected $gateway;

    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * @return \Otisz\Billingo\Gateway
     */
    public function gateway(): Gateway
    {
        return $this->gateway;
    }

    /**
     * @param  string  $uri
     * @param  array  $payload
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $uri, array $payload = []): array
    {
        return $this->gateway->get($uri, $payload);
    }

    /**
     * @param  string  $uri
     * @param  array  $payload
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post(string $uri, array $payload = []): array
    {
        return $this->gateway->post($uri, $payload);
    }

    /**
     * @param  string  $uri
     * @param  array  $payload
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function put(string $uri, array $payload = []): array
    {
        return $this->gateway->put($uri, $payload);
    }

    /**
     * @param  string  $uri
     * @param  array  $payload
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(string $uri, array $payload = []): array
    {
        return $this->gateway->delete($uri, $payload);
    }
}
