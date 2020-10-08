<?php

class ProductFormatter
{
    public static function price(int $price): string
    {
        return '$' . number_format($price / 100, 2);
    }

    public static function amount($amount): string
    {
        return "(" . $amount . ")";
    }
}