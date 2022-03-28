<?php
class Random{
    private $name;
    private $age;
    private $school;

    public function __construct($name = '',$age = 0,$school='')
    {
        $this->name = $name;
        $this->age = $age;
        $this->school = $school;

        
    }

    // magic functions
    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}

$r = new Random('Tansim Anjum',12,'Meherpur Govt. Voys High School');
echo $r->name;
$r->school = 'Notredame school and college';
echo PHP_EOL;
echo $r->school;
