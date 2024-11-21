<?php

namespace Solid\Open\Classes;
use Exception;
use Solid\Open\Interfaces\LogFormatInterface;

class LogFormatter implements LogFormatInterface
{
    private array $formats = ['raw', 'with_date', 'with_date_and_details'];

    public function getStringWithFormat(string $format, string $input_string):  string
    {
        if (!$this->checkStringFormat($format))
        {
            throw new Exception('Invalid format');
        }
        return $this->getFormattedString($format, $input_string);
    }

    public function checkStringFormat(string $format): bool
    {
        return in_array($format, $this->formats, true);
    }

    private function getFormattedString(string $format, string $input_string): string
    {
        return call_user_func([$this, $format], $input_string);
    }
    
    private function raw(string $input_string): string
    {
        return $input_string;
    }

    private function with_date(string $input_string): string
    {
        return date('Y-m-d H:i:s') . " " . $input_string;
    }

    private function with_date_and_details(string $input_string): string
    {
        return date('Y-m-d H:i:s') . " " . $input_string . " - With some details";
    }

}