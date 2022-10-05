<?php

namespace Tests\Core\Orders;

use PHPUnit\Framework\TestCase;
use Source\Core\Orders\Customer;

class CustomerTest extends TestCase
{
    public function testAttributes()
    {
        $customer = new Customer(
            name: "Matheus S. Jose"
        );

        $this->assertEquals("Matheus S. Jose", $customer->getName());

        $customer->changeName(name: "new name");

        $this->assertEquals("new name", $customer->getName());
    }
}
