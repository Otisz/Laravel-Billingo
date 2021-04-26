<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\Billingo;
use Otisz\Billingo\Facades\Partner;

class PartnersTest extends TestCase
{
    /**
     * @var array
     */
    protected $payload;

    protected function setUp(): void
    {
        parent::setUp();

        $this->payload = [
            'name' => $this->faker->name,
            'address' => [
                'country_code' => $this->faker->countryCode,
                'post_code' => $this->faker->postcode,
                'city' => $this->faker->city,
                'address' => $this->faker->streetAddress,
            ],
            'emails' => [
                $this->faker->unique()->safeEmail,
            ],
            'taxcode' => $this->faker->numberBetween(600000, 900000),
            'iban' => $this->faker->iban('hu'),
            'swift' => $this->faker->swiftBicNumber,
            'account_number' => $this->faker->bankAccountNumber,
            'phone' => $this->faker->phoneNumber,
        ];
    }

    /** @test */
    public function partnerIndex(): void
    {
        $partner = Billingo::partners()->store($this->payload);

        $response = Billingo::partners()->index();

        $this->assertContains($partner, $response['data']);
    }

    /** @test */
    public function partnerStore(): void
    {
        self::assertArrayNotHasKey('id', $this->payload);

        $response = Partner::store($this->payload);

        dd($response);

        self::assertArrayHasKey('id', $response);

        self::assertEquals($this->payload['name'], $response['name']);
        self::assertEquals($this->payload['address'], $response['address']);
        self::assertEquals($this->payload['emails'][0], $response['emails'][0]);
        self::assertEquals($this->payload['taxcode'], $response['taxcode']);
        self::assertEquals($this->payload['iban'], $response['iban']);
        self::assertEquals($this->payload['swift'], $response['swift']);
        self::assertEquals($this->payload['account_number'], $response['account_number']);
        self::assertEquals($this->payload['phone'], $response['phone']);
    }

    /** @test */
    public function partnerShow(): void
    {
        $partner = Billingo::partners()->store($this->payload);

        $response = Billingo::partners()->show($partner['id']);

        $this->assertEquals($partner, $response);
    }

    /** @test */
    public function partnerUpdate(): void
    {
        $partner = Billingo::partners()->store($this->payload);

        $payload = $partner;
        unset($payload['id']);
        $payload['name'] = $this->faker->name;

        $response = Billingo::partners()->update($partner['id'], $payload);

        $this->assertNotEquals($partner, $response);
        $this->assertEquals($payload['name'], $response['name']);
    }

    /** @test */
    public function partnerDestroy(): void
    {
        $partner = Billingo::partners()->store($this->payload);

        Billingo::partners()->destroy($partner['id']);

        $response = Billingo::partners()->index();

        $this->assertNotContains($partner, $response['data']);
    }
}
