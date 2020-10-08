<?php


class Product
{
    private string $name;
    private int $price;
    private int $amount;

    public function __construct(string $name, int $price, int $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function price(): int
    {
        return $this->price;
    }

    public function amount(): int
    {
        return $this->amount;
    }
}