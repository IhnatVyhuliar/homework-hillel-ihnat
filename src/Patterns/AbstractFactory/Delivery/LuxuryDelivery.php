<?php

namespace Patterns\AbstractFactory\Delivery;

use Patterns\AbstractFactory\Interfaces\DeliveryType;
use Patterns\AbstractFactory\Cars\LuxurCar;

class LuxuryDelivery implements DeliveryType
{
    public function getCar(): LuxurCar
    {
        return new LuxurCar();
    }
}