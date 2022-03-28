<?php
class Student{
    private $name,$age;

    public function __construct($name,$age)
    {
        $this->name = $name;
        if($age<4){
            throw new Exception("Too Young",1001);
        }elseif($age>35){
            throw new Exception("Too old",1002);
        }
        
    }
}

// sicnce we throwing error in this section, we need to use try catch block here

try{
    $st1 = new Student('Tansim',40);
    echo "Regiseted successfully";
}catch(Exception $e){
    echo $e->getCode().":".$e->getMessage();
}