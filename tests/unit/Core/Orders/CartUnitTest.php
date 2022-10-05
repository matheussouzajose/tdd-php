<?php

namespace Tests\Core\Orders;

use PHPUnit\Framework\TestCase;
use Source\Core\Orders\Cart;
use Source\Core\Orders\Product;

class CartUnitTest extends TestCase
{
    public function testCart()
    {
        $cart = new Cart();
        $cart->add(new Product(
            name: 'test',
            price: 12,
            quantity: 1,
            id: 1
        ));

        $cart->add(new Product(
            name: 'test',
            price: 12,
            quantity: 1,
            id: 1
        ));

        $cart->add(new Product(
            name: 'test',
            price: 12,
            quantity: 1,
            id: 2
        ));

        $this->assertCount(2, $cart->getItems());
        $this->assertEquals(36, $cart->total());
    }
}
