<?php

class Store
{
    private string $name;
    private array $products = [];

    public function __construct(string $name, array $products)
    {
        $this->name = $name;
        foreach ($products as $product) {
            $this->addProduct($product);
        }
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function getAllProducts(): array
    {

        return $this->products;
    }


    public function getName(): string
    {
        return $this->name;
    }
}