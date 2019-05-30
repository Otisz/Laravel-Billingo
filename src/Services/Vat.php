<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Contracts\Vat as Contract;
use Otisz\Billingo\Facades\Billingo;

/**
 * Class Vat
 *
 * @package Otisz\Billingo\Services
 */
class Vat implements Contract
{
    /**
     * @inheritDoc
     */
    public function available($value = null, $description = null)
    {
        $payload = [];

        if ($value !== null) {
            $payload['v'] = $value;
        }

        if ($description !== null) {
            $payload['d'] = $description;
        }

        return Billingo::get('vat', $payload);
    }

    /**
     * @inheritDoc
     */
    public function euVatCode($country, $ipAddress, $businessCountry, $vatCode = null)
    {
        $payload = [
            'country' => $country,
            'ip' => $ipAddress,
            'business_country' => $businessCountry,
        ];

        if ($vatCode !== null) {
            $payload['vat_code'] = $vatCode;
        }

        return Billingo::get('vat/eu', $payload);
    }
}
