<?php
class Motorcycle{

    private $motospecs;
    public function __construct($displacemnt,$capacity,$milege)
    {
        $this->motospecs = [];
        $this->motospecs['displacement'] = $displacemnt;
        $this->motospecs['capacity']= $capacity;
        $this->motospecs['milege'] = $milege;
        
    }

    function getDisplacement(){
        return $this->motospecs['displacement'];
    }

    function __isset($name)
    {
        if(!isset($this->motospecs[$name])){
            echo "Sorry no properties defined";
            return false;
        }
        return true;
    }

    //  property overloading magic function

    function __get($name)
    {
        return $this->motospecs[$name];
    }
    function __set($name, $value)
    {
        $this->motospecs[$name] = $value;
    }
}

$pulasar = new Motorcycle('150cc','44l','45kmph');
echo $pulasar->displacement;
$pulasar->milege = '29kmph';
echo $pulasar->milege;
if(isset($pulasar->tiresize)){
    echo "Found";
}
if(isset($pulasar->displacement)){
    echo "Found";
}