<?php
// copy entire directory to another
echo getcwd().PHP_EOL;
function copyDir($source,$destination){
    $source = rtrim($source,"/");
    $destination = rtrim($destination,"/");

    if(!file_exists($destination)){
        mkdir($destination,0777,false);
    }
    $files =  array_diff(scandir($source),['.','..']);
    print_r($files);
    foreach( $files as $file){
        $sourcePath =  $source.DIRECTORY_SEPARATOR.$file;
        $destinationPath =  $destination.DIRECTORY_SEPARATOR.$file;
        if(is_dir($sourcePath)){
            copyDir($sourcePath,$destinationPath);
        }else{
            copy($sourcePath,$destinationPath);
        }
    }
    echo "File copy completed \n";
}

$source =  getcwd().DIRECTORY_SEPARATOR."File_system";
$destination = getcwd().DIRECTORY_SEPARATOR."File__system2";


copyDir($source,$destination);