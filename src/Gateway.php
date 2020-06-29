<?php

namespace Otisz\Billingo;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class Gateway
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var string|null
     */
    protected $apiKey;

    /**
     * Gateway constructor.
     *
     * @param  string|null  $apiKey
     */
    public function __construct(string $apiKey = null)
    {
        $this->apiKey = $apiKey;

        $this->client = new Client([
            'base_uri' => 'https://api.billingo.hu/v3/',
        ]);
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
        return $this->request('GET', $uri, [
            'query' => $payload,
        ]);
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
        return $this->request('POST', $uri, [
            'json' => $payload,
        ]);
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
        return $this->request('PUT', $uri, [
            'json' => $payload,
        ]);
    }

    /**
     * @param  string  $uri
     * @param  array  $payload
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(string $uri, array $payload = []): void
    {
        $this->request('DELETE', $uri, [
            'query' => $payload,
        ]);
    }

    /**
     * @param  string  $uri
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function download(string $uri): ResponseInterface
    {
        return $this->client->get($uri, [
            'headers' => [
                'X-API-KEY' => $this->apiKey,
                'Accept' => 'application/pdf',
            ],
        ]);
    }

    /**
     * @param  string  $method
     * @param  string  $uri
     * @param  array  $payload
     *
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function request(string $method, string $uri, array $payload = []): ?array
    {
        $defaultOptions = [
            'headers' => [
                'X-API-KEY' => $this->apiKey,
                'Accept' => 'application/json',
            ],
        ];

        $response = $this->client->request($method, $uri, array_merge($defaultOptions, $payload));

        return json_decode($response->getBody(), true);
    }
}
