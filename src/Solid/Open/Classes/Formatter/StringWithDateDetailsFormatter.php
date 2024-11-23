<?php

namespace Solid\Open\Classes\Formatter;

use Solid\Open\Interfaces\LogFormatInterface;

class StringWithDateDetailsFormatter implements LogFormatInterface
{
    public function getStringWithFormat(string $input_string): string
    {
        return date('Y-m-d H:i:s') . $input_string;
    }
}