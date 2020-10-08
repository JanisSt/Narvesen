<?php
require_once 'ProductStorage.php';

class Person
{
    private string $name;
    private int $funds;

    public function __construct(string $name, int $funds)
    {
        $this->name = $name;
        $this->funds = $funds;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function funds($value): int
    {
        return $this->funds - $value;
    }

    public function removeFunds(int $amount): int
    {
        return $this->funds -= $amount;
    }


}