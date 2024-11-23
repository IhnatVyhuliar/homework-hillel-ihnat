<?php

namespace Solid\Open\Classes\Formatter;

use Solid\Open\Interfaces\LogFormatInterface;

class RawStringFormatter implements LogFormatInterface
{
    public function getStringWithFormat(string $input_string): string
    {
        return $input_string;
    }
}