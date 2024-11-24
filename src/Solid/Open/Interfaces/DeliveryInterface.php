<?php

namespace Solid\Open\Interfaces;

interface DeliveryInterface
{
    public function deliveryExecution(string $text_to_deliver): void;
};
