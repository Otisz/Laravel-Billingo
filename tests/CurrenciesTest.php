<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\Billingo;

class CurrenciesTest extends TestCase
{
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
