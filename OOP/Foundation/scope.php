<?php

use Animal as GlobalAnimal;

class Animal{
    protected $name;
    public function __construct($name)
    {  
      $this->name = $name;
      $this->sayHi();
        
    }
    function sayHi(){
        echo "Animal is saying Hi!!";
    }
}

class Human extends Animal{
    function sayHi()
    {
        echo "{$this->name} is saying Hi!!";
    }
}

$h1 = new Human('Areeb');