<?php

namespace Tests\Core\Orders;

use PHPUnit\Framework\TestCase;
use Source\Core\Orders\Product;

class ProductUnitTest extends TestCase
{
    public function testAttribute()
    {
        $product = new Product(
            name: "prodx",
            price: 12.2,
            quantity: 10,
            id: '1',
        );

        $this->assertEquals("prodx", $product->getName());
        $this->assertEquals(12.2, $product->getPrice());
        $this->assertEquals("1", $product->getId());
    }

    public function testCalc()
    {
        $product = new Product(
            name: "prodx",
            price: 12.2,
            quantity: 10,
            id: 1
        );

        $this->assertEquals(122.0, $product->total());
    }

    public function testCalcWithTax10()
    {
        $product = new Product(
            name: "prodx",
            price: 12.2,
            quantity: 10,
            id: '1'
        );

        $this->assertEquals(134.2, $product->totalWithTax10());
    }
}
