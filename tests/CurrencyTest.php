<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\Currency;

class CurrencyTest extends TestCase
{
    public function testConversationRate(): void
    {
        $from = 'EUR';
        $to = 'HUF';

        $response = Currency::conversationRate($from, $to);

        self::assertEquals($from, $response['from_currency']);
        self::assertEquals($to, $response['to_currency']);
        self::assertEquals(today()->toDateString(), $response['date']);

        self::assertArrayHasKey('conversation_rate', $response);
    }

    public function testCurrencyConversationRateWithDate(): void
    {
        $from = 'EUR';
        $to = 'HUF';
        $date = today()->subWeek()->toDateString();

        $response = Currency::conversationRate($from, $to, $date);

        self::assertEquals($from, $response['from_currency']);
        self::assertEquals($to, $response['to_currency']);
        self::assertEquals($date, $response['date']);

        self::assertArrayHasKey('conversation_rate', $response);
    }
}
