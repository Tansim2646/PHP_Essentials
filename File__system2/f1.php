<?php
// echo getcwd();
// $entries = scandir(getcwd());
// // function countDir($dir){
// //     $count = 0;
// //     foreach($dir as $d){
// //         if("." !== $d && ".." !== $d){
// //             if(is_dir($d)){
// //                 $count++;
// //             }
// //         } 


// //     }
// //     return $count;
    
// // }

// // echo countDir($entries);
$entries = opendir(getcwd());

while(false !== ($entry =  readdir($entries))){
    echo $entry."\n";
}

