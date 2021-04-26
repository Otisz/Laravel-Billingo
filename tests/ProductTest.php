<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\Product;

class ProductTest extends TestCase
{
    protected array $payload;

    protected function setUp(): void
    {
        parent::setUp();

        $this->payload = [
            'name' => $this->faker->words(3, true),
            'comment' => $this->faker->sentence,
            'currency' => 'HUF',
            'vat' => '0%',
            'net_unit_price' => $this->faker->numberBetween(1, 9),
            'unit' => $this->faker->randomElement(['darab', 'alkalom', 'óra']),
            'general_ledger_number' => $this->faker->numberBetween(1000, 9999),
            'general_ledger_taxcode' => $this->faker->numberBetween(1000, 9999),
            'entitlement' => 'AAM',
        ];
    }

    public function testIndex(): void
    {
        $product = Product::store($this->payload);

        $response = Product::index();

        self::assertContains($product['id'], $response['data'][0]);

        Product::destroy($product['id']);
    }

    public function testStore(): void
    {
        self::assertArrayNotHasKey('id', $this->payload);

        $response = Product::store($this->payload);

        self::assertArrayHasKey('id', $response);

        self::assertEquals($this->payload['name'], $response['name']);
        self::assertEquals($this->payload['comment'], $response['comment']);
        self::assertEquals($this->payload['currency'], $response['currency']);
        self::assertEquals($this->payload['vat'], $response['vat']);
        self::assertEquals($this->payload['net_unit_price'], $response['net_unit_price']);
        self::assertEquals($this->payload['unit'], $response['unit']);
        self::assertEquals($this->payload['general_ledger_number'], $response['general_ledger_number']);
        self::assertEquals($this->payload['general_ledger_taxcode'], $response['general_ledger_taxcode']);

        Product::destroy($response['id']);
    }

    public function testSow(): void
    {
        $product = Product::store($this->payload);

        $response = Product::show($product['id']);

        self::assertEquals($product, $response);

        Product::destroy($product['id']);
    }

    public function testUpdate(): void
    {
        $product = Product::store($this->payload);

        $payload = $product;
        unset($payload['id']);
        $payload['name'] = $this->faker->words(3, true);

        $response = Product::update($product['id'], $payload);

        self::assertNotEquals($product, $response);
        self::assertEquals($payload['name'], $response['name']);

        Product::destroy($product['id']);
    }

    public function testDestroy(): void
    {
        $product = Product::store($this->payload);

        Product::destroy($product['id']);

        $response = Product::index();

        self::assertNotContains($product, $response['data']);
    }
}
