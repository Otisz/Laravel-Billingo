<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class DocumentBlocks
{
    private $uri = 'document-blocks';

    public function index(array $payload = [])
    {
        return Billingo::get($this->uri, $payload);
    }
}
