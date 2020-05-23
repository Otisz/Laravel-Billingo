<?php

namespace Otisz\Billingo;

use Carbon\Carbon;
use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;

class Gateway
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var string
     */
    private $publicKey;

    /**
     * @var string
     */
    private $privateKey;

    /**
     * @param  string|null  $publicKey
     * @param  string|null  $privateKey
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(?string $publicKey, ?string $privateKey)
    {
        if (!$publicKey || !$privateKey) {
            throw new InvalidArgumentException('Public and/or private key is missing.');
        }

        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;

        $this->client = new Client([
            'base_uri' => 'https://www.billingo.hu/api/',
            'verify' => false,
            'debug' => false,
        ]);
    }

    /**
     * @param  string  $uri
     * @param  array  $payload
     *
     * @return array
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
     * @return array
     */
    public function delete(string $uri, array $payload = []): array
    {
        return $this->request('DELETE', $uri, [
            'query' => $payload,
        ]);
    }

    /**
     * @param  string  $method
     * @param  string  $uri
     * @param  array  $payload
     *
     * @return array
     */
    protected function request(string $method, string $uri, array $payload = []): array
    {
        $defaultOptions = [
            'headers' => [
                'Authorization' => "Bearer {$this->generateBearerToken()}",
                'Accept' => 'application/json',
            ],
        ];

        $response = $this->client->request($method, $uri, array_merge($defaultOptions, $payload));

        return json_decode($response->getBody(), true);
    }

    /**
     * @return string
     */
    protected function generateBearerToken(): string
    {
        $now = Carbon::now('Europe/Budapest')->timestamp;

        $signatureData = [
            'sub' => $this->publicKey,
            'iat' => $now - 60,
            'exp' => $now + 60,
            'iss' => $_SERVER['REQUEST_URI'] ?? 'cli',
            'nbf' => $now - 60,
            'jti' => md5($this->privateKey.$now),
        ];

        $token = JWT::encode($signatureData, $this->privateKey);

        return "Bearer {$token}";
    }

    /**
     * @param  int|string  $invoiceId
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function downloadInvoice($invoiceId): ResponseInterface
    {
        return $this->client->request('GET', "invoices/{$invoiceId}/download", [
            'headers' => [
                'Authorization' => "Bearer {$this->generateBearerToken()}",
                'Accept' => 'application/pdf',
            ],
        ]);
    }
}
