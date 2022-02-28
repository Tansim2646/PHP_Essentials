<?php
$name = "Tansim Anjum Anim";
echo 'My name is {$name} \n';
echo PHP_EOL;
// In this case for using single quote it will not read any data from the varibale

echo "My name is {$name} \n";

// Difference between heredoc and nowdoc

// Heredoc gives you the allowance to to enter a string value with multiple line

$heredoc = <<<EOD
my name is {$name}
I am a student of ULAB

EOD;

echo $heredoc;

// Nowdoc is same as herdoc but works like the single quote because it will not read data from the variable

$nowdoc = <<<'EOD'
my name is {$name}
I am a student of CSE
EOD;

echo $nowdoc;

// ascii code in  string

echo ord('A');
echo PHP_EOL;
echo ord('B');
echo PHP_EOL;
echo chr(65);
echo chr(68);

// substr and how to access data from string
echo PHP_EOL;
$string = 'Hello World';
echo $string[2];
// since string is considered as string array we need to we can access and use the functions of array
$length = strlen($string);
echo PHP_EOL;
echo $length;
// use of substr
echo substr($string,0,5)."\n";
echo substr($string,-5)."\n";
echo substr($string,-5,3);


// How to reverse string in various ways

// lets say we have a sew string in our hand.
$newString = " I am Tansim Anjum Anim";

echo PHP_EOL;
for($i=1;$i<strlen($newString);$i++){
     echo $newString[$i*-1];
}
// another way
echo PHP_EOL;
for($i=strlen($newString)-1;$i>=0;$i--){
    echo $newString[$i];
}
echo PHP_EOL;
// Lets say we want to revers this word by word rather than reversing the entire sentence
$reversed ="";
$tmp="";
$wordCount = 0;
for($n=0;$n<strlen($newString);$n++){
    if($newString[$n] == " "){
        $reversed .= strrev($tmp);
        $tmp ="";
    }
    $tmp .= $newString[$n];
    
}
echo PHP_EOL;
echo $reversed;
echo PHP_EOL;

// Tokenaization of string

$newString = "Hello world,How are you";
$parsts = explode(" ",$newString);
print_r($parsts);

// Lets make the string again
$originalString = join(" ",$parsts);
echo $originalString;

// What is we want to use multiple delipmeter in our string,we can use strtok function then or regular expression

// In terms of using strtok fucntion we cant store the value because we uses the value as the iterator

$iterator = strtok($newString," ,");
while($iterator !== false)
{
    echo $iterator;
    echo PHP_EOL;
    $iterator = strtok(" ,");
}

// Splitting string by using regex in this case it will be stored in an array
// echo PHP_EOL;
// echo PHP_EOL;
// $stringParts = preg_split("/\s|,",$newString);
// echo $stringParts;
//  How many times a particular character is appeared in a string using php

$newStringTwo = "Hello There, This is Tansim Anjum Anim";
$chars =count_chars($newStringTwo,3);
for($m=0;$m<strlen($chars);$m++){
    printf("%s appeared %d \n",$chars[$m],substr_count($newStringTwo,$chars[$m]));

}

// How to find something in an array

$stringForCheck = "Quick brown fox jumped over the lazy dog";
$offset = strpos($stringForCheck,"fox");
if($offset){
    echo "Word is found in position - ".$offset;
}
// What is we want to make it case insensitive
$stringForCheck2 = "Quick brown fox jumped over the lazy dog";
$offset = stripos($stringForCheck,"Fox");
if($offset){
    echo "Word is found in position - ".$offset;
}
// The problem with strpos and why we need to check type of it
$stringForCheck3 = "Quick brown fox jumped over the lazy dog";
$offset3 = strpos($stringForCheck3,"Quick");
if($offset3 !== false){
    echo "Word is found in position - ".$offset3.PHP_EOL;
}else{
    echo "Word is not available in this string\n";
};
echo PHP_EOL;
// Checking a substring from the reverse corner
$stringForCheck4 = "Quick brown fox jumped over the lazy dog";
$offset4 = strrpos($stringForCheck4,"fox");
if($offset4 !== false){
    echo "Word is found in position - ".$offset4.PHP_EOL;
}else{
    echo "Word is not available in this string\n";
};
