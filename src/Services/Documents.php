<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;
use Psr\Http\Message\ResponseInterface;

class Documents
{
    private $uri = 'documents';

    /**
     * @param  array  $payload
     *
     * @return array
     */
    public function index(array $payload = []): array
    {
        return Billingo::get($this->uri, $payload);
    }

    /**
     * @param  array  $payload
     *
     * @return array
     */
    public function store(array $payload): array
    {
        return Billingo::post($this->uri, $payload);
    }

    /**
     * @param  int  $documentID
     *
     * @return array
     */
    public function show(int $documentID): array
    {
        return Billingo::get("{$this->uri}/{$documentID}");
    }

    /**
     * @param  int  $documentID
     *
     * @return array
     */
    public function cancel(int $documentID): array
    {
        return Billingo::post("{$this->uri}/{$documentID}/cancel");
    }

    /**
     * @param  int  $documentID
     *
     * @return array
     */
    public function createFromProforma(int $documentID): array
    {
        return Billingo::post("{$this->uri}/{$documentID}/create-from-proforma");
    }

    /**
     * @param  int  $documentID
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function download(int $documentID): ResponseInterface
    {
        return Billingo::download("{$this->uri}/{$documentID}/download");
    }

    /**
     * @param  int  $documentID
     *
     * @return array
     */
    public function onlineSzamla(int $documentID): array
    {
        return Billingo::get("{$this->uri}/{$documentID}/online-szamla");
    }

    /**
     * @param  int  $documentID
     *
     * @return array
     */
    public function publicURL(int $documentID): array
    {
        return Billingo::get("{$this->uri}/{$documentID}/public-url");
    }

    /**
     * @param  int  $documentID
     *
     * @return array
     */
    public function send(int $documentID): array
    {
        return Billingo::post("{$this->uri}/{$documentID}/send");
    }

    /**
     * @param  int  $documentID
     *
     * @return \Otisz\Billingo\Services\DocumentPayments
     */
    public function payments(int $documentID): DocumentPayments
    {
        return new DocumentPayments($this->uri, $documentID);
    }
}
