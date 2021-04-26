<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Organization
{
    /**
     * @return string[]
     */
    public function show(): array
    {
        return Billingo::get('organization');
    }
}
