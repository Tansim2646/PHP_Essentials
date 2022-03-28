<?php

class  Shape{

}

class Shapes{
    private $Shapes;
    public function __construct()
    {
        $this->Shapes = array();
        
    }
    public function addShape(Shape $shapes){
        array_push($this->Shapes,$shapes);
    }

    public function totalShape(){
        echo count($this->Shapes);
    }

}

class Rectangle extends Shape{

}

class Triangle extends Shape{

}
class Students{

}

$shapeCollection = new Shapes();
$shapeCollection->addShape(new Rectangle);
$shapeCollection->addShape(new Triangle);
// But in this case we cannot add Student to this shapes students because we know that it is not a shape
// $shapeCollection->addShape(new Students());
$shapeCollection->totalShape();