<?php

namespace Otisz\Billingo\Tests\Products;

use Illuminate\Foundation\Testing\WithFaker;
use Otisz\Billingo\Facades\Products;
use Otisz\Billingo\Tests\TestCase;
use Otisz\Billingo\Tests\Traits\WithProduct;

class ProductsIndexTest extends TestCase
{
    use WithFaker;
    use WithProduct;

    protected function setUpFaker(): void
    {
        $this->faker = $this->makeFaker('hu_HU');
    }

    public function testItPerPageCannotBeMoreThan100OrLessThen1(): void
    {
        $response = Products::index(perPage: 101);
        $this->assertSame(25, $response['per_page']);
        $response = Products::index(perPage: 0);
        $this->assertSame(25, $response['per_page']);
    }

    public function testItCanListProducts(): void
    {
        $product = $this->productFactory();

        $created = Products::store($product);

        $response = Products::index(query: $product->getName())['data'][0];

        $this->assertSame($created['id'], $response['id']);
        $this->assertSame($product->getName(), $response['name']);
        $this->assertSame($product->getUnit(), $response['unit']);
        $this->assertSame($product->getCurrency(), $response['currency']);
        $this->assertSame($product->getVat(), $response['vat']);
        $this->assertSame($product->getNetUnitPrice(), (float)$response['net_unit_price']);
        $this->assertSame($product->getComment(), $response['comment']);
        $this->assertSame($product->getGeneralLedgerNumber(), $response['general_ledger_number']);
        $this->assertSame($product->getGeneralLedgerTaxcode(), $response['general_ledger_taxcode']);
    }
}
