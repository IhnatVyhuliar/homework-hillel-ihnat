<?php

namespace Solid\Open\Classes;
use Solid\Open\Interfaces\DeliveryInterface;
use Solid\Open\Interfaces\LogFormatInterface;
use Solid\Open\Classes\Delivery;

class Logger
{
    private LogFormatInterface $formatter;
    private DeliveryInterface $delivery;

    public function __construct(LogFormatInterface $formatter, DeliveryInterface $delivery)
    {
        $this->formatter = $formatter;
        $this->delivery = $delivery;
    }

    public function log(string $string): void
    {
        $this->format($string);
    }

    public function format(string $string): void
    {
        $this->deliver($this->formatter->getStringWithFormat($string));
    }

    public function deliver(string $text_to_deliver): void
    {
        $this->delivery->deliveryExecution($text_to_deliver);
    }

}

