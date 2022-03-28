<?php
class DistricCollection implements IteratorAggregate{
    private $Districts;

    public function __construct()
    {
        $this->Districts = array();
        
    }

    public function setDistrict($name){
        array_push($this->Districts,$name);
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->Districts);
    }

}

$D = new DistricCollection();
$D->setDistrict("Dhaka");
$D->setDistrict("Mehepur");
$D->setDistrict("Magua");
$D->setDistrict("Chuadnga");
foreach($D as $d){
    echo $d. "\n";
}