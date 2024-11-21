<?php

namespace Solid\Open\Interfaces;

interface DeliveryInterface
{
    public function deliveryExecution(string $format, string $text_to_deliver);
    public function checkDeliveryFormat(string $delivery_method);
};
