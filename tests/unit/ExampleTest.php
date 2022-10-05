<?php

namespace Source;

use Mockery;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function test_example()
    {
        Mockery::mock(\stdClass::class)->shouldReceive('teste')->andReturn(true);
        $this->assertTrue(true);
    }
}
