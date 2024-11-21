<?php

namespace Solid\Open\Classes;
use Solid\Open\Classes\LogFormatter;
use Solid\Open\Classes\Delivery;

class Logger
{

    private LogFormatter $formatter;
    private Delivery $delivery;
    private string $string_format;
    private string $delivery_format;

    public function __construct(LogFormatter $formatter, Delivery $delivery, string $string_format, string $delivery_format)
    {
        $this->formatter = $formatter;
        $this->delivery = $delivery;
        $this->string_format = $string_format;
        $this->delivery_format = $delivery_format; 
    }

    public function log(string $string): void
    {
        //echo $this->string_format.'  '.$this->$string;
        $this->format($this->string_format, $string);
    }

    public function format(string $string_format, string $string): void
    {
        $this->deliver($this->formatter->getStringWithFormat($string_format, $string));
    }

    public function deliver(string $text_to_deliver): void
    {
        //echo $text_to_deliver;
        $this->delivery->deliveryExecution($this->delivery_format, $text_to_deliver);
    }

}

