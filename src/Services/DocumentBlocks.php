<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class DocumentBlocks
{
    private $uri = 'document-blocks';

    /**
     * @param  array  $payload
     *
     * @return array
     */
    public function index(array $payload = []): array
    {
        return Billingo::get($this->uri, $payload);
    }
}
