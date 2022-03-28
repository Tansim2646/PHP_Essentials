<?php
class Dir{
     private $directories = [];
     private $files = [];
     private $path;

    //  constructor
    public function __construct($dir)
    {
        if(is_readable($dir)){
            $this->path = $dir;
            $entries = opendir($dir);
            while(false !== ($entry = readdir($entries))){
                if("." !== $entry && ".." !== $entry){
                    if(is_dir($this->path.DIRECTORY_SEPARATOR.$entry)){
                        array_push($this->directories,$entry);
                    }else{
                        array_push($this->files,$entry);
                    }
                }
            }
        }
        
    }
    // TO get the all the directories we need to write this function
    public function getDirectories(){
        return $this->directories;
    }
    // To get all the files in this directory we need this function
    public function getFiles(){
        return $this->files;
    }
    // to get a particular directory

    public function getDirectory($index){
        if(isset($this->directories[$index])){
            return new Dir($this->path.DIRECTORY_SEPARATOR.$this->directories[$index]);

        }else{
            throw new Exception("No such directory found in this index \n");
        }
    }
}

$newDir = new Dir(getcwd());
print_r($newDir->getDirectories());
print_r($newDir->getFiles());
$date = $newDir->getDirectory(0);
print_r($date->getFiles());

