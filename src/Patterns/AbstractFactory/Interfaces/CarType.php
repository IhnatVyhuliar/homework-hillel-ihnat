<?php

namespace Patterns\AbstractFactory\Interfaces;

interface CarType
{
    public function getModel(): string;
    public function setModel(string $model): void;

    public function getPrice(): int;
    public function setPrice(int $price): void;
}