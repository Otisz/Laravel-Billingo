<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\Organization;

class OrganizationTest extends TestCase
{
    public function testShow(): void
    {
        $response = Organization::show();

        self::assertArrayHasKey('tax_code', $response);
    }
}
