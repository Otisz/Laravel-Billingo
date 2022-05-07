<?php

namespace Otisz\Billingo\Tests\Products;

use Illuminate\Foundation\Testing\WithFaker;
use Otisz\Billingo\Builders\ProductBuilder;
use Otisz\Billingo\Enums\Currencies;
use Otisz\Billingo\Enums\Vats;
use Otisz\Billingo\Exceptions\InvalidProductException;
use Otisz\Billingo\Facades\Products;
use Otisz\Billingo\Tests\TestCase;

class ProductsUpdateTest extends TestCase
{
    use WithFaker;

    protected function setUpFaker(): void
    {
        $this->faker = $this->makeFaker('hu_HU');
    }

    public function testItCannotUpdateAProductWithInvalidProperties(): void
    {
        $product = ProductBuilder::instance()
            ->setName($this->faker->words(asText: true))
            ->setUnit($this->faker->randomElement(['piece', 'hour', 'day']))
            ->setCurrency($this->faker->randomElement(Currencies::cases()))
            ->setVat($this->faker->randomElement(Vats::cases()))
            ->setNetUnitPrice($this->faker->randomFloat(2, 1, 100))
            ->setComment($this->faker->sentence)
            ->setGeneralLedgerNumber($this->faker->randomNumber(5))
            ->setGeneralLedgerTaxcode($this->faker->randomNumber(5));
        $created = Products::store($product);

        $productUpdate = ProductBuilder::instance();
        $this->expectException(InvalidProductException::class);
        Products::update($created['id'], $productUpdate);
    }

    public function testItCanUpdateAProduct(): void
    {
        $product = ProductBuilder::instance()
            ->setName($this->faker->words(asText: true))
            ->setUnit($this->faker->randomElement(['piece', 'hour', 'day']))
            ->setCurrency($this->faker->randomElement(Currencies::cases()))
            ->setVat($this->faker->randomElement(Vats::cases()))
            ->setNetUnitPrice($this->faker->randomFloat(2, 1, 100))
            ->setComment($this->faker->sentence)
            ->setGeneralLedgerNumber($this->faker->randomNumber(5))
            ->setGeneralLedgerTaxcode($this->faker->randomNumber(5));

        $created = Products::store($product);

        $productUpdate = ProductBuilder::instance()
            ->setName($this->faker->words(asText: true))
            ->setUnit($this->faker->randomElement(['piece', 'hour', 'day']))
            ->setCurrency($this->faker->randomElement(Currencies::cases()))
            ->setVat($this->faker->randomElement(Vats::cases()))
            ->setNetUnitPrice($this->faker->randomFloat(2, 1, 100))
            ->setComment($product->getComment())
            ->setGeneralLedgerNumber($product->getGeneralLedgerNumber())
            ->setGeneralLedgerTaxcode($product->getGeneralLedgerTaxcode());

        $response = Products::update($created['id'], $productUpdate);

        $this->assertSame($productUpdate->getName(), $response['name']);
        $this->assertSame($productUpdate->getUnit(), $response['unit']);
        $this->assertSame($productUpdate->getCurrency(), $response['currency']);
        $this->assertSame($productUpdate->getVat(), $response['vat']);
        $this->assertSame($productUpdate->getNetUnitPrice(), $response['net_unit_price']);
        $this->assertSame($product->getComment(), $response['comment']);
        $this->assertSame($product->getGeneralLedgerNumber(), $response['general_ledger_number']);
        $this->assertSame($product->getGeneralLedgerTaxcode(), $response['general_ledger_taxcode']);
    }
}
