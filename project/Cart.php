<?php

class Cart
{
    private array $products = [];

    public function addProduct(Product $product, int $count = 1): void
    {
        if (array_key_exists($product->getTitle(), $this->products)) {
            $this->products[$product->getTitle()]['quantity'] += $count;
        } else {
            $this->products[$product->getTitle()] = [
                'price' => $product->getPrice(),
                'quantity' => $count
            ];
        }
    }

    public function removeProduct(Product $product): void
    {
        unset($this->products[$product->getTitle()]);
    }

    public function reduceQuantity(Product $product, int $count = 1): void
    {
        if (array_key_exists($product->getTitle(), $this->products) && $this->products[$product->getTitle()]['quantity'] > $count) {
            $this->products[$product->getTitle()]['quantity'] -= $count;
        } else {
            $this->removeProduct($product);
        }
    }

    public function getProducts(): array
    {
        return $this->products;
    }

// В ДЗ непонятно написано, зачем нужно учитывать, что некоторые товары могут представлять из себя комплекты других
// товаров, если до этого было сказано, что стоимость этого комплекта должна быть равна сумме стоимостей её компонентов.
// Я общую сумму стоимости компонентов посчитала в товаре.
    public function getSum(): float
    {
        $sum = 0.0;
        foreach ($this->products as $product) {
            $sum += $product['price'] * $product['quantity'];
        }
        return $sum;
    }
}