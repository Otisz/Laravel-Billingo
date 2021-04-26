<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\Currency;

class CurrenciesTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        self::markTestIncomplete('Cannot be tested, because I do not have permissions yet.');
    }

    public function testCurrencyConversationRate(): void
    {
        $from = 'EUR';
        $to = 'HUF';

        $response = Currency::conversationRate($from, $to);

        dd($response);

        $this->assertEquals($from, $response['from_currency']);
        $this->assertEquals($to, $response['to_currency']);

        $this->assertArrayHasKey('conversation_rate', $response);
    }
}
