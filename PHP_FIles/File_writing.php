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

    

$fp = fopen($fileName,'w');
foreach($students as $student){
    // ----------- Since we are adding data in csv format we can get advantage of using it csv function ------------------

    // $data = sprintf("%s,%s,%s,%s,%s\n",$student['fname'],$student['lname'],$student['age'],$student['dateofbirth'],$student['birthplace']);
    fputcsv($fp,$student);

};
fclose($fp);

// <------------------ In this section we are reading the data ------------------------------------ >


// $fp = fopen($fileName,'r');
// while($line = fgetcsv($fp)){
// //     $data = explode(",",$line);
//    printf("First name = %s\n Last name = %s\n Age = %s\n Date of Birth = %s\n Birthplace = %s\n",$line[0],$line[1],$line[2],$line[3],$line[4]);

// }
// fclose($fp);

// // <-----------------lets we want to add a new data in the file -------------------------->

// Since we want to append the data so it is better for us to open this file in read format
// $newStudent = array(
//     'fname' => "Nowsahd",
//     'lname' => "kabir",
//     'age'  => '29',
//     'dateofbirth' => '19/05/1989',
//     'birthplace' => 'Mymensingh',
// );

// // Now lets open the file again
// $fp = fopen($fileName,'a');
// fputcsv($fp,$newStudent);
// fclose($fp);


// // <----------------------  How to delete a particular data from a file --------------->

// // In order to delete a particular data we need to read the entire file at oncce

// // The data we get after reading the file at once

$fileData = file($fileName);
// By using uset function we can delete data from a particular index
unset($fileData[4]);
print_r($fileData);
$fp = fopen($fileName,"w");
foreach($fileData as $file){
    fwrite($fp,$file);

}
fclose($fp);


