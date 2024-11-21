<?php

use Solid\Open\Classes\Logger;

use Solid\Open\Classes\Delivery;
use Solid\Open\Classes\LogFormatter;


$delivery = new Delivery();
$log_formatter = new LogFormatter();


$logger = new Logger($delivery, $log_formatter, 'raw', 'by_sms');
$logger->log('Emergency error! Please fix me!');

