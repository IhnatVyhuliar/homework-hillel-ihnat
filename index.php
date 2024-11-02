<?php
require_once('src/autoload.php');

use Classes\Color;
use Classes\Test;

$color = new Color(0, 0, 100);
$color2 = new Color(0, 0, 0);
var_dump($color->equals($color2));
$color_static = Color::random();

$color_mixed = $color->mix(new Color(100, 100, 0));
echo $color_mixed->getRed()."<br>";
echo $color_mixed->getGreen()."<br>";
echo $color_mixed->getBlue()."<br>";

$test = new Test();
echo $test->getSum();