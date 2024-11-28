<?php

namespace Patterns\AbstractFactory\Factories;

use Patterns\AbstractFactory\Delivery\EconomDelivery;
use Patterns\AbstractFactory\Interfaces\AbstractFactory;
use Patterns\AbstractFactory\Interfaces\DeliveryType;

class StandartFactory implements AbstractFactory
{
    public function getFactory(): DeliveryType
    {
        return new EconomDelivery();
    }
}