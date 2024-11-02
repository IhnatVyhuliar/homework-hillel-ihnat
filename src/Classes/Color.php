<?php

namespace Classes;

use Exception;

class Color{
    private int $red;
    private int $green;
    private int $blue;

    public function __construct(int $red, int $green, int $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    static public function random(): Color
    {
        return new Color(random_int(0, 255), random_int(0, 255), random_int(0, 255));
    }


    public function setRed(int $red): void
    {
        $this->validateColorsWithException($red);
        $this->red = $red;
    }   
    
    public function setGreen(int $green): void
    {
        $this->validateColorsWithException($green);
        $this->green = $green;
    }   

    public function setBlue(int $blue): void
    {
        $this->validateColorsWithException($blue);
        $this->blue = $blue;
    }   

    public function getRed(): int
    {
        return $this->red;
    }   
    
    public function getGreen(): int
    {
        return $this->green;
    }   

    public function getBlue(): int
    {
        return $this->blue;
    }   


    public function equals(Color $color): bool
    {
        return $color->getRed() == $this->red&
                $color->getGreen() == $this->green&
                $color->getBlue() == $this->blue;
    }

    public function mix(Color $color): Color
    {
        $red_tmp = intdiv(($color->getRed() + $this->red), 2);
        $green_tmp = intdiv(($color->getGreen() + $this->green), 2);
        $blue_tmp = intdiv(($color->getBlue() + $this->blue), 2);
        return new Color($red_tmp, $green_tmp, $blue_tmp);

    }
    
    protected function validateColorsWithException(int $color): void
    {
        if (!$this->validateColors($color)){
            throw new Exception("Color {$color} is not valid");
        }
    }

    protected function validateColors(int $color): bool
    {
        return $color < 255 && $color >= 0;
    }

}