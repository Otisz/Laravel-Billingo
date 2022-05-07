<?php

namespace Otisz\Billingo\Tests\Products;

use Illuminate\Foundation\Testing\WithFaker;
use Otisz\Billingo\Builders\ProductBuilder;
use Otisz\Billingo\Enums\Currencies;
use Otisz\Billingo\Enums\Vats;
use Otisz\Billingo\Facades\Products;
use Otisz\Billingo\Tests\TestCase;

class ProductsShowTest extends TestCase
{
    use WithFaker;

    protected function setUpFaker(): void
    {
        $this->faker = $this->makeFaker('hu_HU');
    }

    public function testItCanShowAProduct(): void
    {
        $product = ProductBuilder::instance()
            ->setName($this->faker->words(asText: true))
            ->setUnit($this->faker->randomElement(['piece', 'hour', 'day']))
            ->setCurrency($this->faker->randomElement(Currencies::cases()))
            ->setVat($this->faker->randomElement([Vats::PERCENT_0, Vats::PERCENT_27, Vats::AAM]))
            ->setNetUnitPrice($this->faker->randomFloat(2, 1, 100))
            ->setComment($this->faker->sentence)
            ->setGeneralLedgerNumber($this->faker->randomNumber(5))
            ->setGeneralLedgerTaxcode($this->faker->randomNumber(5));

        $created = Products::store($product);

        $response = Products::show($created['id']);

        $this->assertSame($created['id'], $response['id']);
        $this->assertSame($product->getName(), $response['name']);
        $this->assertSame($product->getUnit(), $response['unit']);
        $this->assertSame($product->getCurrency(), $response['currency']);
        $this->assertSame($product->getVat(), $response['vat']);
        $this->assertSame($product->getNetUnitPrice(), $response['net_unit_price']);
        $this->assertSame($product->getComment(), $response['comment']);
        $this->assertSame($product->getGeneralLedgerNumber(), $response['general_ledger_number']);
        $this->assertSame($product->getGeneralLedgerTaxcode(), $response['general_ledger_taxcode']);
    }
}
