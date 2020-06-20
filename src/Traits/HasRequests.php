<?php

namespace Otisz\Billingo\Traits;

trait HasRequests
{
    /**
     * @param  string  $uri
     * @param  array  $payload
     *
     * @return array
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
     */
    public function put(string $uri, array $payload = []): array
    {
        return $this->gateway->put($uri, $payload);
    }

    /**
     * @param  string  $uri
     * @param  array  $payload
     */
    public function delete(string $uri, array $payload = []): void
    {
        $this->gateway->delete($uri, $payload);
    }
}
