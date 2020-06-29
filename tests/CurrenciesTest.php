<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\Billingo;

class CurrenciesTest extends TestCase
{
    /** @test */
    public function currenciesIndex(): void
    {
        $currencies = Billingo::currencies()->index();

        $this->assertEquals([
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
        ], $currencies);
    }

    /** @test */
    public function currencyConversationRate(): void
    {
        $payload = ['from' => 'EUR', 'to' => 'HUF'];

        $response = Billingo::currencies()->conversationRate($payload);

        $this->assertEquals($payload['from'], $response['from_currency']);
        $this->assertEquals($payload['to'], $response['to_currency']);

        $this->assertArrayHasKey('conversation_rate', $response);
    }
}
