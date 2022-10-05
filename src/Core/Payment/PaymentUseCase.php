<?php

namespace Source\Core\Payment;

class PaymentUseCase
{
    private PaymentRepositoryInterface $payment;

    public function __construct(PaymentRepositoryInterface $payment)
    {
        $this->payment = $payment;
    }

    public function execute(): bool
    {
        return $this->payment->makePayment([]);
    }
}
