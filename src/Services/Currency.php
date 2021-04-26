<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

/**
 * This service is untested.
 * Currently i don't have permission to use those endpoints.
 * If you have any issue, feel free to open an issue on GitHub.
 */
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
