<?php
// creating classes in PHP

class Human{
    public $name;
    private $age;
    function sayHi(){
        echo "Salam";
        $this->sayName();
    }
    // using of the constructor function
    // here, beside personAge we are using =0 means this parameter is optional
    function __construct($personName,$personAge=0)
    {
        $this->name = $personName;
        $this->age = $personAge;
        
        
    }
    function sayName(){
        if($this->age){
            echo "Hello,my name is {$this->name} and i am {$this->age} years old \n";
            return;
        }
        echo "Hello,my name is {$this->name} and i don't know my age\n";

    }
}

class Cat{
    function sayHi(){
        echo "Meeow";
    }
}
class Dog{
    function sayHi(){
        echo "Whoop";
    }
}

// creating objects of these classes
// $h1= new Human;
// $h2 = new Human;
// $c1 = new Cat;
// $d1 = new Dog;
// $h1 ->name = "Tansim"; // Setting the property
// $h2 ->name = "Tanvir";

// // echo $h1->name; //getting the property
// // echo PHP_EOL;
// // $h1->sayHi();
// // echo PHP_EOL;
// // $c1->sayHi();
// // echo PHP_EOL;
// // $d1->sayHi();
// $h1->sayHi();
// echo PHP_EOL;
// $h2->sayHi();
$h1 = new Human('Tansim Anjum Anim',28);
$h2 = new Human('Ashikur Rhaman');
$h1->sayName();
$h2->sayName();
