<?php

namespace Patterns\AbstractFactory\Interfaces;

use Patterns\AbstractFactory\Interfaces\CarType;

interface DeliveryType
{
    public function getCar(): CarType;
}