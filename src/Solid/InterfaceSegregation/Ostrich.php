<?php

namespace Solid\InterfaceSegregation;
use Solid\InterfaceSegregation\Interfaces\Flyable;
use Solid\InterfaceSegregation\Interfaces\Eating;

class Ostrich implements Eating
{
    public function eat(){}
}
