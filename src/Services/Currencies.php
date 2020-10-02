<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Currencies
{
    private $uri = 'currencies';

    /**
     * @param  string  $from
     * @param  string  $to
     *
     * @return array
     */
    public function conversationRate(string $from, string $to): array
    {
        return Billingo::get($this->uri, ['from' => $from, 'to' => $to]);
    }
}
