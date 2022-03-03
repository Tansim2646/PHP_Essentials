<?php 
$filename = "/Users/anim/Desktop/PHP_Projects/PHP_FIles/File/data.txt";
// File pointer
if(is_readable($filename)){
    $fp = fopen($filename,"r");
// $line= fgets($fp);
while($line = fgets($fp)){
    echo $line;

}
echo "----------- \n";
rewind($fp);
while($line = fgets($fp)){
    echo $line;

}
echo "----------- \n";
fseek($fp,11);

while($line = fgets($fp)){
    echo $line;

}

// How to get the entire file in an arrray line by line
$data = file($filename);
print_r($data);
// To get the entire file data inside a string
$dataText = file_get_contents($filename);
echo $dataText;
}else{
    ?>
    <h1>File not Readable</h1>
    <?php
}