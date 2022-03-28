<?php
// Static functions

class MathCalculator{
    private $number;
    // static variable to access by the static funtion
    static $name;


    static function fibonacci(){
        // accessign the static variable
        echo self::$name;
        self::doSomething();
        echo "This is from static function \n";
    }

    static function doSomething(){
        echo "Doing Something!! \n";
    }

    public function fatorial(){
        self::$name = 'ABCD';
        $this->number = "Tansim Anjum Anim";
        $this->doSomething();
        self::doSomething();
        echo $this->number.PHP_EOL;
        echo "This is from factorial \n";

    }
}

$obj1 = new MathCalculator();
$obj1->fatorial();
MathCalculator::fibonacci();