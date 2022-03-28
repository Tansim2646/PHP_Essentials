<?php
// Directory recursive Iterator
// if we awant skip . and .. we need to change this FLAG
$rd =  new RecursiveDirectoryIterator("./",RecursiveDirectoryIterator::SKIP_DOTS);
$files =  new RecursiveIteratorIterator($rd);

// funcntion for looking a particualar file exists in this project or not
getFile($files,"File_writing.php");
getJsFileQuantity($files);


function getFile($fileStack,$fileName){
    foreach($fileStack as $file){
        if($file->getFileName() === $fileName){
            echo "{$fileName} exists in this path {$file->getPathName()} \n";
        }
    }

}
// fucntion for finding out how many js file is included in this directory

function getJsFileQuantity($fileStack){
    $quantity = 0;
    foreach($fileStack as $file){
        if(strpos($file->getFileName(),".js")){
             $quantity++;
        }

    }
    echo "{$quantity} number of js file has been found";
}