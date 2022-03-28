<?php
class Newclass{

    final function doSomething(){
        echo "Doing something";
    }

}

class Newclass2 extends Newclass{
    function doSomething()
    {
        echo "Doing something from Newclass2";
    }
}

$obj1 = new Newclass2();
$obj1->doSomething();