<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\Partner;

class PartnerTest extends TestCase
{
    protected array $payload;

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

    public function testIndex(): void
    {
        $partner = Partner::store($this->payload);

        $response = Partner::index();

        self::assertContains($partner, $response['data']);
    }

    public function testStore(): void
    {
        self::assertArrayNotHasKey('id', $this->payload);

        $response = Partner::store($this->payload);

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

    public function testShow(): void
    {
        $partner = Partner::store($this->payload);

        $response = Partner::show($partner['id']);

        self::assertEquals($partner, $response);
    }

    public function testUpdate(): void
    {
        $partner = Partner::store($this->payload);

        $payload = $partner;
        unset($payload['id']);
        $payload['name'] = $this->faker->name;

        $response = Partner::update($partner['id'], $payload);

        self::assertNotEquals($partner, $response);
        self::assertEquals($payload['name'], $response['name']);
    }

    public function testDestroy(): void
    {
        $partner = Partner::store($this->payload);

        Partner::destroy($partner['id']);

        $response = Partner::index();

        self::assertNotContains($partner, $response['data']);
    }
}
