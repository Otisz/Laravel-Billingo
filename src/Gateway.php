<?php

namespace Otisz\Billingo;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

abstract class Gateway
{
    protected string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    protected function httpGet(string $url, array $query = null): array
    {
        return $this->client()
                ->get($url, $query)
                ->json() ?? [];
    }

    protected function httpPost(string $url, array $payload = []): array
    {
        return $this->client()
                ->post($url, $payload)
                ->json() ?? [];
    }

    protected function httpPut(string $url, array $payload = []): array
    {
        return $this->client()
                ->put($url, $payload)
                ->json() ?? [];
    }

    protected function httpDelete(string $url): array
    {
        return $this->client()
                ->delete($url)
                ->json() ?? [];
    }

    protected function download(string $url, array $headers = []): Response
    {
        return $this->client([...$headers, 'Accept' => 'application/pdf'])
            ->get($url);
    }

    protected function client(array $headers = []): PendingRequest
    {
        $merged = [
            'X-API-KEY' => $this->apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            ...$headers,
        ];

        return Http::baseUrl('https://api.billingo.hu/v3')
            ->throw()
            ->withHeaders($merged);
    }
}
