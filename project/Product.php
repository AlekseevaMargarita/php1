<?php

class Product
{
    private string $title = 'Product';
    private float $price = 0.0;
    private array $components = [];

    public function __construct(string $title)
    {
        $this->title = $title;
    }


    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    private function setPriceBySum(): void
    {
        $sum = 0.0;
        foreach ($this->components as $component) {
            $sum += $component->getPrice();
        }
        $this->price = $sum;
    }

    public function setPrice(float $price): void
    {
        if (count($this->components)) {
            $this->setPriceBySum();
        } else {
            $this->price = $price;
        }
    }

    public function getComponents(): array
    {
        return $this->components;
    }

    public function setComponents(Product $component): void
    {
        $this->components[] = $component;
        $this->setPriceBySum();
    }

}