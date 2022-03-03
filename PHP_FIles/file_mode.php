<?php
// In r+ mode we both can read and write
$fileName = "/Users/anim/Desktop/PHP_Projects/PHP_FIles/File/file_mode.txt";
// $file__pointer = fopen($fileName,"r+");
// echo fgets($file__pointer);
// echo fgets($file__pointer);
// fwrite($file__pointer,"Mercury\n");
// fwrite($file__pointer,"Mercury");

// Its essential for us to lock the file while content is adding to a file to avoid race conditions 
file_put_contents($fileName,"Tansim Anjum Anim",FILE_APPEND|LOCK_EX);
file_put_contents($fileName,"Tanvir Anjum Ankur",FILE_APPEND|LOCK_EX);