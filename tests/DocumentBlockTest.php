<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\DocumentBlock;

class DocumentBlockTest extends TestCase
{
    public function testIndex(): void
    {
        $response = DocumentBlock::index();

        self::assertArrayHasKey('id', head($response['data']));
        self::assertArrayHasKey('name', head($response['data']));
        self::assertArrayHasKey('prefix', head($response['data']));
        self::assertArrayHasKey('custom_field1', head($response['data']));
        self::assertArrayHasKey('custom_field2', head($response['data']));
    }
}
