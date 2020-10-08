<?php

class ProductStorage
{
    private string $path;
    private array $basket;

    public function __construct(string $path, array $basket)
    {
        $this->path = $path;
        $this->basket = $basket;

    }

    public function load(): array
    {
        $content = file_get_contents($this->path);

        $rows = array_filter((array)explode('|', $content));
        $products = [];
        foreach ($rows as $row) {
            $productData = explode(';', $row);
            $products[] = new Product
            (trim($productData[0]),
                (int)$productData[1],
                (int)$productData[2]

            );
        }
        return $products;
    }

    public function buy($userInput, $userNumber)
    {
        $content = file_get_contents($this->path);
        $rows = array_filter((array)explode('|', $content));
        $T = explode(';', $rows[$userInput]);
        array_push($this->basket, $T[0], ':', $userNumber);

        foreach ($this->basket as $string)

            echo $string;
    }

    public function pay($userInput, $userNumber): int
    {
        $content = file_get_contents($this->path);
        $rows = array_filter((array)explode('|', $content));
        $T = explode(';', $rows[$userInput]);
        return $userNumber * intval($T[1]);
    }


}