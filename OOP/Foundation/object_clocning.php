<?php
class Color{
    private $color;
    public function __construct($color)
    {
        $this->color = $color;

        
    }

    public function setColor($color){
        $this->color = $color;
    }


}

class FavColor{
    private $favcolor;
    private $color;

    public function __construct($color)
    {
        $this->favcolor = $color;
        $this->color = new Color($color);
        
    }

}

$fc1 = new FavColor('red');
$fc2 = clone $fc1;
print_r($fc1);
print_r($fc2);
