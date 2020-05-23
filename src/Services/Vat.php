<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Vat
{
    /**
     * Get a listing of available VAT codes
     *
     * @example https://billingo.readthedocs.io/en/latest/vat/#return-a-list-of-available-vat-codes
     *
     * @param  mixed|null  $value  The value to filter for (eg. 0.27)
     * @param  mixed|null  $description  The description to filter for (eg. AM)
     *
     * @return array
     */
    public function available($value = null, $description = null): array
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
     * Get a listing of available VAT codes
     *
     * @example https://billingo.readthedocs.io/en/latest/vat/#get-eu-vat-code
     *
     * @param  string  $country  the ISO3166 country code given by the user (eg. DE)
     * @param  string  $ipAddress  The IP address of the user
     * @param  string  $businessCountry  The ISO3166 country code for the operating business
     * @param  string|null  $vatCode  The EU VAT code for the user (eg. DE13816200)
     *
     * @return array
     */
    public function euVatCode($country, $ipAddress, $businessCountry, $vatCode = null): array
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
