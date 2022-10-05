<?php

namespace Source\Core\Orders;

class Customer
{
    public function __construct(
        protected string $name
    )
    {
    }

    public function changeName(string $name): Customer
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
