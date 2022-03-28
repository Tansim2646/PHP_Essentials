<?php
$x = 21;
$y = 21;
// Spaceshipe operator
// $x <=> means : if $x is less than $y it will return -1, if $x is equal to $y it will return 0 & if $x is greater than $y it will return.
// it wshould be stored in a variable otherwise it will not work as expected;
$result = $x <=> $y;

if($result === 1){
    echo "{$x} is greater than {$y}";

}elseif($result === 0){
    echo "{$x} is equal to {$y}";
  
}else{
    echo "{$x} is less than {$y}";
}