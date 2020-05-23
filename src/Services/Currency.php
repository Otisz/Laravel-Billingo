<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Currency
{
    /**
     * Convert amount from to
     *
     * @example https://billingo.readthedocs.io/en/latest/currency/#convert-value
     *
     * @param  int|float|double  $value  The amount to convert
     * @param  string  $from  The currency to convert from (eg. EUR)
     * @param  string  $to  The currency to convert to (eg. USD)
     *
     * @return array
     */
    public function convert($value, string $from, string $to): array
    {
        return Billingo::get('currency', [
            'from' => $from,
            'to' => $to,
            'value' => $value,
        ]);
    }
}
