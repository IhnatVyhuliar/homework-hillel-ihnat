<?php

namespace Solid\Open\Interfaces;

interface LogFormatInterface
{
    public function getStringWithFormat(string $input_string): string;
};
