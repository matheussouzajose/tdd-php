<?php

namespace Tests\Core\Payment;

use Mockery;
use PHPUnit\Framework\TestCase;
use Source\Core\Orders\Product;
use Source\Core\Payment\PaymentRepositoryInterface;
use Source\Core\Payment\PaymentUseCase;

class PaymentUseCaseTest extends TestCase
{
    public function testPayment()
    {
        $mockeryPayment = Mockery::mock(\stdClass::class, PaymentRepositoryInterface::class);
        $mockeryPayment
            ->shouldReceive('makePayment')
            ->times(1)
            ->andReturn(true);

        $payment = new PaymentUseCase($mockeryPayment);
        $response = $payment->execute();

        $this->assertTrue($response);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testExampleMock()
    {
        $mockProduct = Mockery::mock(Product::class, [
             'name', 12, 1, 'id'
        ]);

        $mockProduct->shouldReceive('getId')->andReturn('id');

        $this->assertEquals('id', $mockProduct->getId());
    }
}
