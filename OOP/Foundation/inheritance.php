<?php

use Cat as GlobalCat;

class Animal{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
        
    }
    public function run(){
        echo "{$this->name} is running";
    }
    public function sleep(){
        echo "{$this->name} is running";
    }
    public function play(){
        echo "{$this->name} is playing";
    }
    public function greet(){

    }
}

// Human should be inherited by the Animal class
class Human extends Animal{
    // overriding the greet function since it is not decleared yet.
    public function greet(){
        echo "{$this->name} is saying Hi!!";
        echo PHP_EOL;

    }
}
class Cat extends Animal{
    public function greet()
    {
        echo PHP_EOL;
        echo "{$this->name} is saying Meeow";
    }
}

$human1 = new Human('Tansim Amjum');
$human1->run();
$cat1 = new Cat('mini');
$cat1->greet();
