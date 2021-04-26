<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Currency
{
    /**
     * @param  string  $from
     * @param  string  $to
     * @param  string|null  $date
     *
     * @return array
     */
    public function conversationRate(string $from, string $to, string $date = null): array
    {
        $payload = ['from' => $from, 'to' => $to];

        if ($date) {
            $payload['date'] = $date;
        }

        return Billingo::get('currencies', $payload);
    }
}
