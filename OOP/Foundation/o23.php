<?php
class Color{
    private $color;
    function __construct($color)
    {
        $this->color = $color;
        
    }

    function setColor($color){
        $this->color =  $color;
    }
    // to print the object we can use this to string magic functions

    function __toString()
    {
        return "The value of color is {$this->color} \n";
    }
}

$c1 =  new Color('Red');
echo $c1;

