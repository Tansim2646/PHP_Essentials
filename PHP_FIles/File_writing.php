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
print_r($students);

/*$fp = fopen($fileName,'w');
foreach($students as $student){
    $data = sprintf("%s,%s,%s,%s,%s\n",$student['fname'],$student['lname'],$student['age'],$student['dateofbirth'],$student['birthplace']);
    fwrite($fp,$data); 
};
fclose($fp);*/
$fp = fopen($fileName,'r');
while($line = fgets($fp)){
    $data = explode(",",$line);
   printf("First name = %s\n Last name = %s\n Age = %s\n Date of Birth = %s\n Birthplace = %s\n",$data[0],$data[1],$data[2],$data[3],$data[4]);
}
fclose($fp);
