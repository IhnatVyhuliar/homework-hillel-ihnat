<?php

namespace Patterns\AbstractFactory\Delivery;

use Patterns\AbstractFactory\Interfaces\DeliveryType;
use Patterns\AbstractFactory\Cars\EconomCar;

class EconomDelivery implements DeliveryType
{
    public function getCar(): EconomCar
    {
        return new EconomCar();
    }
}