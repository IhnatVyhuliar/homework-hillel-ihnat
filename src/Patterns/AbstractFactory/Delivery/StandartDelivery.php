<?php

namespace Patterns\AbstractFactory\Delivery;

use Patterns\AbstractFactory\Interfaces\DeliveryType;
use Patterns\AbstractFactory\Cars\StandartCar;

class StandartDelivery implements DeliveryType
{
    public function getCar(): StandartCar
    {
        return new StandartCar();
    }
}