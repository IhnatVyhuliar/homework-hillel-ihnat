<?php

namespace Solid\Open\Classes;
use Solid\Open\Interfaces\DeliveryInterface;
use Exception;

class Delivery implements DeliveryInterface
{
    private array $delivery_methods = ['by_email', 'by_sms', 'to_console'];

    public function deliveryExecution(string $format, string $text_to_deliver): void
    {
        if (!$this->checkDeliveryFormat($format))
        {
            throw new Exception('Invalid format');
        }
        $this->getDeliveredString($format, $text_to_deliver);
    }

    public function checkDeliveryFormat(string $delivery_method): bool
    {
        return in_array($delivery_method, $this->delivery_methods);
    }

    private function getDeliveredString(string $format, string $text_to_deliver): void
    {
        call_user_func([$this, $format], $text_to_deliver);
    }

    private function by_email(string $text_to_deliver): void
    {
        echo "Вывод формата ({$text_to_deliver}) по имейл";
    }

    private function by_sms(string $text_to_deliver): void
    {
        echo "Вывод формата ({$text_to_deliver}) в смс";
    }

    private function to_console(string $text_to_deliver): void
    {
        echo "Вывод формата ({$text_to_deliver}) в консоль";
    }

}