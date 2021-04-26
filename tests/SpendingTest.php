<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\Partner;
use Otisz\Billingo\Facades\Spending;

class SpendingTest extends TestCase
{
    private array $partner;

    private array $payload;

    protected function setUp(): void
    {
        parent::setUp();

        $this->partner = [
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

        $this->payload = [
            'currency' => 'HUF',
            'conversion_rate' => 1,
            'total_gross' => 1,
            'total_gross_huf' => 1,
            'total_vat_amount' => 1,
            'total_vat_amount_huf' => 1,
            'fulfillment_date' => '2021-04-26',
            'paid_at' => '2021-04-26',
            'category' => 'advertisement',
            'comment' => $this->faker->words(4, true),
            'invoice_number' => 'string',
            'invoice_date' => '2021-04-26',
            'due_date' => '2021-04-26',
            'payment_method' => 'aruhitel',
        ];
    }

    public function testIndex(): void
    {
        $partner = Partner::store($this->partner);
        $this->payload['partner_id'] = $partner['id'];
        $spending = Spending::store($this->payload);

        $response = Spending::index();

        self::assertContains($spending, $response['data']);
    }

    public function testStore(): void
    {
        $partner = Partner::store($this->partner);
        $this->payload['partner_id'] = $partner['id'];
        $response = Spending::store($this->payload);

        self::assertArrayHasKey('id', $response);

        self::assertEquals($this->payload['category'], $response['category']);
        self::assertEquals($this->payload['paid_at'], $response['paid_at']);
        self::assertEquals($this->payload['fulfillment_date'], $response['fulfillment_date']);
        self::assertEquals($this->payload['invoice_number'], $response['invoice_number']);
        self::assertEquals($this->payload['currency'], $response['currency']);
        self::assertEquals($this->payload['total_gross'], $response['total_gross']);
        self::assertEquals($this->payload['total_vat_amount'], $response['total_vat_amount']);
        self::assertEquals($this->payload['invoice_date'], $response['invoice_date']);
        self::assertEquals($this->payload['due_date'], $response['due_date']);
    }

    public function testShow(): void
    {
        $partner = Partner::store($this->partner);
        $this->payload['partner_id'] = $partner['id'];
        $spending = Spending::store($this->payload);

        $response = Spending::show($spending['id']);

        self::assertEquals($spending['id'], $response['id']);
    }

    public function testUpdate(): void
    {
        $partner = Partner::store($this->partner);
        $this->payload['partner_id'] = $partner['id'];
        $spending = Spending::store($this->payload);

        $payload = $spending;
        $payload['category'] = 'development';
        $payload['conversion_rate'] = 3;
        $payload['total_gross_huf'] = 4;
        $payload['total_vat_amount_huf'] = 2;

        $response = Spending::update($spending['id'], $payload);

        self::assertNotEquals($spending['id'], $response);
        self::assertEquals($payload['category'], $response['category']);
    }

    public function testDestroy(): void
    {
        $spending = Spending::store($this->payload);

        Spending::destroy($spending['id']);

        $response = Spending::index();

        self::assertNotContains($spending['id'], $response['data']);
    }
}
