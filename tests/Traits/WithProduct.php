<?php

namespace Otisz\Billingo\Tests\Traits;

use Otisz\Billingo\Builders\ProductBuilder;
use Otisz\Billingo\Enums\Currencies;
use Otisz\Billingo\Enums\Vats;

trait WithProduct
{
    public function productFactory(bool $minimal = false): ProductBuilder
    {
        $product = ProductBuilder::instance()
            ->setName($this->faker->words(asText: true))
            ->setUnit($this->faker->randomElement(['piece', 'hour', 'day']))
            ->setCurrency($this->faker->randomElement(Currencies::cases()))
            ->setVat($this->faker->randomElement([Vats::PERCENT_0, Vats::PERCENT_27, Vats::AAM]))
            ->setNetUnitPrice($this->faker->randomFloat(2, 1, 100));

        if ($minimal) {
            return $product;
        }

        return $product->setComment($this->faker->sentence)
            ->setGeneralLedgerNumber($this->faker->randomNumber(5))
            ->setGeneralLedgerTaxcode($this->faker->randomNumber(5));
    }
}
