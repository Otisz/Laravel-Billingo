<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Connector;

use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use Otisz\Billingo\Contracts\Connectable;
use Otisz\Billingo\Exceptions\ConnectorException;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class Connector
 *
 * @package Otisz\Billingo\Connector
 */
class Connector implements Connectable
{
    /**
     * @var \GuzzleHttp\Client $client
     */
    private $client;

    /**
     * @var array $config
     */
    private $config;

    /**
     * @var \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     */
    private $resolver;

    /**
     * Connector constructor.
     *
     * @param $options
     */
    public function __construct($options)
    {
        $this->config = $this->resolveOptions($options);
        $this->client = new Client([
            'verify' => false,
            'base_uri' => $this->config['host'],
            'debug' => false,
        ]);
    }

    /**
     * Get required options for the Billingo API to work.
     *
     * @param $opts
     *
     * @return array
     */
    protected function resolveOptions($opts): array
    {
        $this->resolver = new OptionsResolver();
        $this->resolver->setDefault('version', '2');
        $this->resolver->setDefault('host', 'https://www.billingo.hu/api/'); // might be overridden in the future
        $this->resolver->setDefault('leeway', 60);
        $this->resolver->setRequired(['host', 'version', 'leeway']);

        if (array_key_exists('token', $opts)) {
            $this->resolver->setRequired('token');
        } else {
            $this->resolver->setRequired([
                'private_key',
                'public_key',
            ]);
        }

        return $this->resolver->resolve($opts);
    }

    /**
     * Make a request to the Billingo API.
     *
     * @param string $method
     * @param string $uri
     * @param array $data
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function request(string $method, string $uri, array $data = []): array
    {
        // get the key to use for the query
        $queryKey = $method === strtoupper('GET') || $method === strtoupper('DELETE') ? 'query' : 'json';

        // make signature
        $response = $this->client->request($method, $uri, [
            $queryKey => $data,
            'headers' => $this->generateAuthHeader(),
        ]);

        $jsonData = json_decode($response->getBody(), true);

        if ($jsonData === null) {
            throw new ConnectorException('Cannot decode: ' . $response->getBody());
        }

        if ($jsonData['success'] === 0 || $response->getStatusCode() !== 200) {
            throw new ConnectorException('Error: ' . $jsonData['error'], $response->getStatusCode());
        }

        if (array_key_exists('data', $jsonData) && $jsonData['data']) {
            return $jsonData['data'];
        }

        return [];
    }

    /**
     * @inheritDoc
     */
    public function get(string $uri, array $payload = [])
    {
        return $this->request('GET', $uri, $payload);
    }

    /**
     * @inheritDoc
     */
    public function post(string $uri, array $payload = [])
    {
        return $this->request('POST', $uri, $payload);
    }

    /**
     * @inheritDoc
     */
    public function put(string $uri, array $payload = [])
    {
        return $this->request('PUT', $uri, $payload);
    }

    /**
     * @inheritDoc
     */
    public function delete(string $uri, array $payload = [])
    {
        return $this->request('DELETE', $uri, $payload);
    }

    /**
     * Downloads the given invoice.
     *
     * @param int|string $invoiceId
     * @param null $file
     *
     * @return \Psr\Http\Message\StreamInterface|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function downloadInvoice($invoiceId, $file = null)
    {
        $uri = "invoices/{$invoiceId}/download";
        $options = [
            'headers' => $this->generateAuthHeader(),
        ];

        if ($file !== null) {
            $options['sink'] = $file;
        }

        $response = $this->client->request('GET', $uri, $options);

        return $response instanceof ResponseInterface ? $response->getBody() : null;
    }

    /**
     * Get billingo token for user.
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @param $pubKey
     * @param $privateKey
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function getBillingoToken($pubKey, $privateKey)
    {
        $tokenRequest = new TokenRequest($pubKey, $privateKey);
        $response = $this->get('token', [
            'tokenrequest' => $tokenRequest->generateWithSignatureAndTiming(),
        ]);

        return $response['token'];
    }

    /**
     * Generate JWT authorization header.
     *
     * @return string
     */
    public function generateJWTArray(): string
    {
        $time = time();
        $iss = $_SERVER['REQUEST_URI'] ?? 'cli';
        $signatureData = [
            'sub' => $this->config['public_key'],
            'iat' => $time - $this->config['leeway'],
            'exp' => $time + $this->config['leeway'],
            'iss' => $iss,
            'nbf' => $time - $this->config['leeway'],
            'jti' => md5($this->config['public_key'] . $time),
        ];

        return JWT::encode($signatureData, $this->config['private_key']);
    }

    /**
     * Generate authentication header based on JWT.
     *
     * @return array
     */
    protected function generateJWTHeader(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->generateJWTArray(),
        ];
    }

    /**
     * When using BillingoToken for authentication
     * use this function to generate the correct header.
     *
     * @return array
     */
    protected function generateBillingoTokenHeader(): array
    {
        return [
            'X-Billingo-Token' => $this->config['token'],
        ];
    }

    /**
     * Generate the correct authentication header(s) either JWT or BillingoToken.
     *
     * @return array
     */
    protected function generateAuthHeader(): array
    {
        if ($this->resolver->isDefined('token')) {
            return $this->generateBillingoTokenHeader();
        }

        return $this->generateJWTHeader();
    }
}
