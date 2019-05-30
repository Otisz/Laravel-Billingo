<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Contracts\Currency as Contract;
use Otisz\Billingo\Facades\Billingo;

/**
 * Class Currency
 *
 * @package Otisz\Billingo\Services
 */
class Currency implements Contract
{
    /**
     * @inheritDoc
     */
    public function convert($value, string $from, string $to)
    {
        $payload = [
            'from' => $from,
            'to' => $to,
            'value' => $value,
        ];

        return Billingo::get('currency', $payload);
    }
}
