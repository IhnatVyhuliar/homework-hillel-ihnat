<?php
require_once('src/autoload.php');

use Classes\Color;

$color = new Color(0, 0, 30);
$color2 = new Color(0, 0, 0);
var_dump($color->equals($color2));
$color_static = Color::random();

$color_mixed = $color->mix(new Color(20, 10, 20));
echo $color_mixed->getRed()."<br>";
echo $color_mixed->getGreen()."<br>";
echo $color_mixed->getBlue()."<br>";