<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\Billingo;

class CurrenciesTest extends TestCase
{
    /** @test */
    public function currencyConversationRate(): void
    {
        $from = 'EUR';
        $to = 'HUF';

        $response = Billingo::currencies()->conversationRate($from, $to);

        $this->assertEquals($from, $response['from_currency']);
        $this->assertEquals($to, $response['to_currency']);

        $this->assertArrayHasKey('conversation_rate', $response);
    }
}
