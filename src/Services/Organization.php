<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Organization
{
    private $uri = 'organization';

    /**
     * @return string[]
     */
    public function show(): array
    {
        return Billingo::get($this->uri);
    }
}
