<?php

namespace Source\Core\Payment;

class PagarMe implements PaymentRepositoryInterface
{
    public function createPlan(array $data): array
    {
        return [];
    }

    public function findClientById(string $id): ?object
    {
        return new \stdClass();
    }

    public function makePayment(array $data): bool
    {
        return true;
    }
}
