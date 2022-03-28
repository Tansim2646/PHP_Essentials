<?php
echo getcwd().PHP_EOL;
chdir("File_system");
echo getcwd().PHP_EOL;
mkdir("test/test1/test2",0777,true);
file_put_contents("test/f1.txt","tansim ANjum ANim");
file_put_contents("test/test1/f1.txt","tansim ANjum ANim");
file_put_contents("test/test1/test2/f2.txt","tansim ANjum ANim");
sleep(7);
deleteDir(getcwd().DIRECTORY_SEPARATOR."test");


function deleteDir($dir){
    $filesInPath = scandir($dir);
    $filesInPath =  array_diff($filesInPath,['.','..']);
    print_r($filesInPath);
    if(!empty($filesInPath)){
        foreach($filesInPath as $file){
            $filePath = $dir.DIRECTORY_SEPARATOR.$file;
            if(is_dir($filePath)){
                deleteDir($filePath);
            }else{
                unlink($filePath);
            }
        }   
    }
    rmdir($dir);
}

