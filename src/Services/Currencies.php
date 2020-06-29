<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Currencies
{
    private $uri = 'currencies';

    /**
     * @return string[]
     */
    public function index(): array
    {
        return [
            'AUD' => 'AUD',
            'BGN' => 'BGN',
            'BRL' => 'BRL',
            'CAD' => 'CAD',
            'CHF' => 'CHF',
            'CNY' => 'CNY',
            'CZK' => 'CZK',
            'DKK' => 'DKK',
            'EUR' => 'EUR',
            'GBP' => 'GBP',
            'HKD' => 'HKD',
            'HRK' => 'HRK',
            'HUF' => 'HUF',
            'IDR' => 'IDR',
            'ILS' => 'ILS',
            'INR' => 'INR',
            'ISK' => 'ISK',
            'JPY' => 'JPY',
            'KRW' => 'KRW',
            'LTL' => 'LTL',
            'LVL' => 'LVL',
            'MXN' => 'MXN',
            'MYR' => 'MYR',
            'NOK' => 'NOK',
            'NZD' => 'NZD',
            'PHP' => 'PHP',
            'PLN' => 'PLN',
            'RON' => 'RON',
            'RSD' => 'RSD',
            'RUB' => 'RUB',
            'SEK' => 'SEK',
            'SGD' => 'SGD',
            'THB' => 'THB',
            'TRY' => 'TRY',
            'UAH' => 'UAH',
            'USD' => 'USD',
            'ZAR' => 'ZAR',
        ];
    }

    public function conversationRate(array $payload)
    {
        return Billingo::get($this->uri, $payload);
    }
}
