<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\Billingo;

class OrganizationTest extends TestCase
{
    /** @test */
    public function organizationShow(): void
    {
        $response = Billingo::organization()->show();

        $this->assertArrayHasKey('tax_code', $response);
    }
}
