<?php
class Fund{
    private $fund;

    function __construct($initFund=0)
    {
        $this->fund=$initFund;
        
    }
    // funtion for adding fund
    function addFund($amount){
        $this->fund += $amount;
    }
    // function for deducting fund
    function deductFund($amount){
        $this->fund -=$amount;
    }
    // funtion for getting total fund
    function totalFund(){
        echo "Your Total balance Is {$this->fund}\n";
    }
}

$newFund = new Fund(200);
$newFund->totalFund();
$newFund->addFund(65);
$newFund->totalFund();
$newFund->deductFund(25);
$newFund->totalFund();