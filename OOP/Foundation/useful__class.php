<?php
class RGB{
    private $color;
    private $red;
    private $green;
    private $blue;

    function __construct($colorCode ='')
    {
        $this->color = ltrim($colorCode,"#");
        $this->parseColor();
        
    }

    // getter function
    public function getColor(){
        return $this->color;
    }
    // function for getting RGb color
    public function getRGBcolor(){
        return array($this->red,$this->green,$this->blue);
    }
    // setter function
    public function setColor($colorCode){
        $this -> color = ltrim($colorCode,"#");
    }
    // parsing color
    private function parseColor(){
       if($this->color){
           list($this->red,$this->green,$this->blue) = sscanf($this->color,"%02x%02x%02x");
           }else{
            list($this->red,$this->green,$this->blue) = array(0,0,0);
           }
    }
    // read rgb Color
    public function readRGB(){
        echo "Red = {$this->red}\n Green = {$this->green}\n Blue = {$this->blue} ";
    }
}

$c1 = new RGB("#fc03f0");
$c1->readRGB();
    
