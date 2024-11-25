<?php

namespace Patterns\AbstractFactory\Cars;

use Patterns\AbstractFactory\Interfaces\CarType;

abstract class Car implements CarType
{
    private string $model = "";
    private int $price = 0;

    public function getModel(): string
    {
        return isset($this->model) ? $this->model : null;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;

    }

    public function getPrice(): int 
    {
        return isset($this->price) ? $this->price : null;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
}