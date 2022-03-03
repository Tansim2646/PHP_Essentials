<?php
$filename = "/Users/anim/Desktop/PHP_Projects/PHP_FIles/File/data_write.txt";
if (is_writable($filename)) {
    $fp = fopen($filename, "a");
    fwrite($fp, "Annafi\n");
    fwrite($fp, "Tansim\n");
    fwrite($fp, "Anjum\n");
    fwrite($fp, "Anim\n");
    fwrite($fp, "Tanvir \n");
    fwrite($fp, "Anjum\n");
    fwrite($fp, "Ankur\n");
}
