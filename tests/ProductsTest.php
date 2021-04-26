<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\Billingo;
use Otisz\Billingo\Facades\Product;

class ProductsTest extends TestCase
{
    /**
     * @var array
     */
    protected $payload;

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
        ];
    }

    /** @test */
    public function productIndex(): void
    {
        $product = Billingo::products()->store($this->payload);

        $response = Billingo::products()->index();

        $this->assertContains($product, $response['data']);
    }

    /** @test */
    public function productStore(): void
    {
        $this->assertArrayNotHasKey('id', $this->payload);

        $response = Product::store($this->payload);

        dd($response);

        $this->assertArrayHasKey('id', $response);

        $this->assertEquals($this->payload['name'], $response['name']);
        $this->assertEquals($this->payload['comment'], $response['comment']);
        $this->assertEquals($this->payload['currency'], $response['currency']);
        $this->assertEquals($this->payload['vat'], $response['vat']);
        $this->assertEquals($this->payload['net_unit_price'], $response['net_unit_price']);
        $this->assertEquals($this->payload['unit'], $response['unit']);
        $this->assertEquals($this->payload['general_ledger_number'], $response['general_ledger_number']);
        $this->assertEquals($this->payload['general_ledger_taxcode'], $response['general_ledger_taxcode']);
    }

    /** @test */
    public function productShow(): void
    {
        $product = Billingo::products()->store($this->payload);

        $response = Billingo::products()->show($product['id']);

        $this->assertEquals($product, $response);
    }

    /** @test */
    public function productUpdate(): void
    {
        $product = Billingo::products()->store($this->payload);

        $payload = $product;
        unset($payload['id']);
        $payload['name'] = $this->faker->words(3, true);

        $response = Billingo::products()->update($product['id'], $payload);

        $this->assertNotEquals($product, $response);
        $this->assertEquals($payload['name'], $response['name']);
    }

    /** @test */
    public function productDestroy(): void
    {
        $product = Billingo::products()->store($this->payload);

        Billingo::products()->destroy($product['id']);

        $response = Billingo::products()->index();

        $this->assertNotContains($product, $response['data']);
    }
}
