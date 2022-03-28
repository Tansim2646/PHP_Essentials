<?php

// directory itereator class

$dir = new DirectoryIterator("./");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<pre>
    <?php
    foreach($dir as $file){
        if(is_file($file)){
            echo "yaay its a file"."\n";
        }
    }
    
    ?>
</pre>
    
</body>
</html>
