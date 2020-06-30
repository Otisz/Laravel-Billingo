<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Currencies
{
    private $uri = 'currencies';

    /**
     * @param  array  $payload
     *
     * @return array
     */
    public function conversationRate(array $payload): array
    {
        return Billingo::get($this->uri, $payload);
    }
}
