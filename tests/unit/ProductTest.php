<?php

namespace Source;

use Exception;
use PHPUnit\Framework\TestCase;

/**
 * Exemplos de testes
 */
class ProductTest extends TestCase
{
//    protected function setUp(): void
//    {
//        var_dump("setUp");
//    }
//
//    protected function tearDown(): void
//    {
//        var_dump("tearDown");
//    }
//
//    public static function setUpBeforeClass(): void
//    {
//        var_dump("setUpBeforeClass");
//    }
//
//    public static function tearDownAfterClass(): void
//    {
//        var_dump("tearDownAfterClass");
//    }

    public function testProductClass()
    {
        $product = new Product();

        $this->assertInstanceOf(Product::class, $product);
        $this->assertClassHasAttribute("id", Product::class);
        $this->assertClassHasAttribute("name", Product::class);
        $this->assertClassHasAttribute("price", Product::class);
        $this->assertClassHasAttribute("quantity", Product::class);
        $this->assertClassHasAttribute("total", Product::class);
    }

    public function testIfIdIsNull()
    {
        $product = new Product();
        $this->assertNull($product->getId());
    }

    public function testSetAndGetName()
    {
        $product = new Product();
        $result = $product->setName('Produto');
        $name = $product->getName();

        $this->assertInstanceOf(Product::class, $result);
        $this->assertIsString($name);
        $this->assertEquals('Produto', $name);
    }

    public function testSetAndGetPrice()
    {
        $product = new Product();
        $result = $product->setPrice(1000);
        $price = $product->getPrice();

        $this->assertInstanceOf(Product::class, $result);
        $this->assertIsFloat($price);
        $this->assertEquals(1000, $price);
    }

    public function testSetAndGetQuantity()
    {
        $product = new Product();
        $result = $product->setQuantity(10);
        $quantity = $product->getQuantity();

        $this->assertInstanceOf(Product::class, $result);
        $this->assertIsInt($quantity);
        $this->assertEquals(10, $quantity);
    }

    public function testSetAndGetTotal()
    {
        $product = new Product();
        $result = $product->setTotal(1000);
        $total = $product->getTotal();

        $this->assertInstanceOf(Product::class, $result);
        $this->assertIsFloat($total);
        $this->assertEquals(1000, $total);
    }

    /**
     * @dataProvider collectionData
     */
    public function testEncapsulate($property, $expected)
    {
        $product = new Product();
        $set = $product->{'set' . ucfirst($property)}($expected);
        $get = $product->{'get'. ucfirst($property)}();

        $this->assertInstanceOf(Product::class, $set);
        $this->assertEquals($expected, $get);
    }

    public function collectionData(): array
    {
        return [
          ['name', 'Meu produto'],
          ['price', 100.00],
          ['quantity', 10],
          ['total', 1000.00],
        ];
    }

    /**
     * @throws Exception
     *
     */
    public function testException()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Test Exception');

        $product = new Product();
        $product->exception();
    }
}
