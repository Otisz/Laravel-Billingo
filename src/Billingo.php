<?php

namespace Otisz\Billingo;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Billingo
{
    protected string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function get(string $url, array $query = null): array
    {
        return $this->client()
            ->get($url, $query)
            ->json() ?? [];
    }

    public function post(string $url, array $payload = []): array
    {
        return $this->client()
            ->post($url, $payload)
            ->json() ?? [];
    }

    public function put(string $url, array $payload = []): array
    {
        return $this->client()
            ->put($url, $payload)
            ->json() ?? [];
    }

    public function delete(string $url): array
    {
        return $this->client()
            ->delete($url)
            ->json() ?? [];
    }

    public function download(string $url, array $headers = []): Response
    {
        return $this->client(array_merge(['Accept' => 'application/pdf'], $headers))
            ->get($url);
    }

    protected function client(array $headers = []): PendingRequest
    {
        $headers = array_merge([
            'X-API-KEY' => $this->apiKey,
            'Accept' => 'application/json',
        ], $headers);

        return Http::baseUrl('https://api.billingo.hu/v3')
            ->withHeaders($headers);
    }
}
