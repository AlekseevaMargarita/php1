<?php

class Cart
{
    private array $products = [];

    public function addProduct(Product $product, int $count = 1): void
    {
        $this->products[$product->getName()] = $count;
    }

    public function removeProduct(Product $product): void
    {
        unset($this->products[$product->getName()]);
    }

    public function getProducts(): array
    {
        return $this->products;
    }

}