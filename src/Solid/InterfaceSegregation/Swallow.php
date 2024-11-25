<?php

namespace Solid\InterfaceSegregation;
use Solid\InterfaceSegregation\Interfaces\Flyable;
use Solid\InterfaceSegregation\Interfaces\Eating;

class Swallow implements Flyable, Eating
{
    public function eat(){}
    public function fly() {}
}
