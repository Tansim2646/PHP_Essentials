<?php
// abstract class and abstract function forces us to deifne the abstracted function inside the child class
// Also abstract class protexts the class from being instantiated.

abstract class AnimalTwo{
    function sayHi(){
        echo "Hello this is Tansim Anjum Anim";
    }
    abstract  function eat();
}

class Human extends AnimalTwo{
    function eat(){
        echo "I am eating\n";
    }

}

$h1 = new Human;
$h1->eat();
$h1->sayHi();

