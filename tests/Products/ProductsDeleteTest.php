<?php

namespace Otisz\Billingo\Tests\Products;

use Illuminate\Foundation\Testing\WithFaker;
use Otisz\Billingo\Builders\ProductBuilder;
use Otisz\Billingo\Enums\Currencies;
use Otisz\Billingo\Enums\Vats;
use Otisz\Billingo\Facades\Products;
use Otisz\Billingo\Tests\TestCase;

class ProductsDeleteTest extends TestCase
{
    use WithFaker;

    protected function setUpFaker(): void
    {
        $this->faker = $this->makeFaker('hu_HU');
    }

    public function testItCanDeleteAProducts(): void
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

        $totalBefore = Products::index()['total'];

        $response = Products::delete($created['id']);

        $this->assertEmpty($response);

        $response = Products::index(query: $product->getName());

        $this->assertSame(0, $response['total']);
        $this->assertEmpty($response['data']);

        $totalAfter = Products::index()['total'];

        $this->assertLessThan($totalBefore, $totalAfter);
    }
}
