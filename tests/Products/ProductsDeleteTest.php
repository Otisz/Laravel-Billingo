<?php

namespace Otisz\Billingo\Tests\Products;

use Illuminate\Foundation\Testing\WithFaker;
use Otisz\Billingo\Facades\Products;
use Otisz\Billingo\Tests\TestCase;
use Otisz\Billingo\Tests\Traits\WithProduct;

class ProductsDeleteTest extends TestCase
{
    use WithFaker;
    use WithProduct;

    protected function setUpFaker(): void
    {
        $this->faker = $this->makeFaker('hu_HU');
    }

    public function testItCanDeleteAProducts(): void
    {
        $product = $this->productFactory();

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
