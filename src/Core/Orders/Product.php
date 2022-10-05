<?php

namespace Source\Core\Orders;

class Product
{
    public function __construct(
        protected string $name,
        protected float $price,
        protected int $quantity,
        protected string $id = '',
    )
    {
    }

    public function total(): float|int
    {
        return $this->price * $this->quantity;
    }

    public function totalWithTax10(): float|int
    {
        $sum = $this->price * $this->quantity;
        return ($sum * 0.1) + $sum;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getId(): string
    {
        return $this->id;
    }
}
