<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class DocumentPayments
{
    /**
     * @var string
     */
    protected $uri;

    /**
     * @var int
     */
    protected $documentID;

    public function __construct(string $uri, int $documentID)
    {
        $this->uri = $uri;
        $this->documentID = $documentID;
    }

    /**
     * @return array
     */
    public function show(): array
    {
        return Billingo::get("{$this->uri}/{$this->documentID}/payments");
    }

    /**
     * @param  array  $payload
     *
     * @return array
     */
    public function update(array $payload): array
    {
        return Billingo::put("{$this->uri}/{$this->documentID}/payments", $payload);
    }

    /**
     * @return void
     */
    public function destroy(): void
    {
        Billingo::delete("{$this->uri}/{$this->documentID}/payments");
    }
}
