<?php
class Shape{
    protected $name;
    protected $area;
    
    public function __construct($name)
    {
        $this->name = $name;
        $this->area = $this->calculateArea();
        
    }
    public function getArea(){
        echo "{$this->name}'s area is {$this->area}";
    }
    public function calculateArea(){

    }
    
}

class Circle extends Shape{
    private $radius;
    public function __construct($r,$name)

    {
        $this->radius = $r;
        parent::__construct($name);


        
    }
    public function calculateArea(){
        return sprintf("%f",3.14*pow($this->radius,2));
    }
}

$newCircle = new Circle(95,'Red Circle');
$newCircle->getArea();