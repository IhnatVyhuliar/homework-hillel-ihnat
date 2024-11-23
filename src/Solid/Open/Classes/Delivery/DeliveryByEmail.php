<?php

namespace Solid\Open\Classes\Delivery;
use Solid\Open\Interfaces\DeliveryInterface;


class DeliveryByEmail implements DeliveryInterface
{
    public function deliveryExecution(string $text_to_deliver): void
    {
        echo "Вывод формата ({$text_to_deliver}) по имейл";
    }
}