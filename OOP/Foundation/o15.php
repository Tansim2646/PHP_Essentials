<?php
class A{
    static function sayHi(){
        echo "From a class A \n";
    }
}

class B extends A{
    // static function sayHi()
    // {
    //     echo "From class B \n";
    //     parent::sayHi();
    // }
}

B::sayHi();