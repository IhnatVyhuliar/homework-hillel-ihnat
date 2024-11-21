<?php

namespace Solid\Open\Interfaces;

interface LogFormatInterface
{
    public function getStringWithFormat(string $format, string $input_string);
    public function checkStringFormat(string $format);
};
