<?php
$fileName= "/Users/anim/Desktop/PHP_Projects/PHP_FIles/File/bunch_data.txt";
$students = [
    array(
        'fname' => 'Tansim',
        'lname' => 'Anjum',
        'age' => '26',
        'dateofbirth' => '16/07/1995',
        'birthplace' => 'Meherpur'
    ),
    array(
        'fname' => 'Tanvir',
        'lname' => 'Anjum',
        'age' => '34',
        'dateofbirth' => '14/01/1987',
        'birthplace' => 'Meherpur'
    ),
    array(
        'fname' => 'Morsalin',
        'lname' => 'Mabir',
        'age' => '24',
        'dateofbirth' => '28/08/1997',
        'birthplace' => 'Dhaka'
    ),
    array(
        'fname' => 'Areeb',
        'lname' => 'Ahmed Quaraishi',
        'age' => '26',
        'dateofbirth' => '02/02/1996',
        'birthplace' => 'Dhaka'
    )
    ];

$data = serialize($students);
// Since we are putting the entire data at once so here we can use file_put_contents with lock and file append
file_put_contents($fileName,$data,FILE_APPEND|LOCK_EX);
// lets read the data form the serialize data
$datafromfile = file_get_contents($fileName);
// Lets unserialize this data
$datafromfile = unserialize($datafromfile);
// Lets add a new student
$newStudent = array(
    'fname' => 'Salman',
        'lname' => 'Kabir Annafi',
        'age' => '27',
        'dateofbirth' => '16/07/1997',
        'birthplace' => 'Meherpur'
);
// since we knw after unserializing it is array so we can push the data at the end
array_push($datafromfile,$newStudent);
print_r($datafromfile);
// Lets save this data again to file
$datafromfile = serialize($datafromfile);
file_put_contents($fileName,$datafromfile,FILE_APPEND|LOCK_EX);



