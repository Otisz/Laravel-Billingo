<?php

namespace Otisz\Billingo\Tests\Partners;

use Illuminate\Foundation\Testing\WithFaker;
use Otisz\Billingo\Facades\Partners;
use Otisz\Billingo\Tests\TestCase;
use Otisz\Billingo\Tests\Traits\WithPartner;

class PartnerDeleteTest extends TestCase
{
    use WithFaker;
    use WithPartner;

    protected function setUpFaker(): void
    {
        $this->faker = $this->makeFaker('hu_HU');
    }

    public function testItCanDeleteAnExistingPartner(): void
    {
        $partner = $this->partnerFactory();

        $created = Partners::store($partner);

        $totalBefore = Partners::index()['total'];

        $response = Partners::delete($created['id']);

        $this->assertEmpty($response);

        $response = Partners::index(query: $partner->getName());

        $this->assertSame(0, $response['total']);
        $this->assertEmpty($response['data']);

        $totalAfter = Partners::index()['total'];

        $this->assertLessThan($totalBefore, $totalAfter);
    }
}
