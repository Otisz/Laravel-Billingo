<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\Billingo;

class DocumentBlocksTest extends TestCase
{
    /** @test */
    public function documentBlocksIndex(): void
    {
        $response = Billingo::documentBlocks()->index();

        $this->assertArrayHasKey('id', head($response['data']));
        $this->assertArrayHasKey('name', head($response['data']));
        $this->assertArrayHasKey('prefix', head($response['data']));
        $this->assertArrayHasKey('custom_field1', head($response['data']));
        $this->assertArrayHasKey('custom_field2', head($response['data']));
    }
}
