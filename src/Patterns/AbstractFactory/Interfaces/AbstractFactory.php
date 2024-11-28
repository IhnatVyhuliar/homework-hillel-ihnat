<?php

namespace Patterns\AbstractFactory\Interfaces;
use Patterns\AbstractFactory\Interfaces\DeliveryType;

interface AbstractFactory
{
    public function getFactory(): DeliveryType; 
}