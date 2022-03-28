<!-- Application Profiling -->
<?php
$startTime = microtime(true);
factorial(10000000);
// sleep(2);
$endTime  = microtime(true);
$time  = $endTime - $startTime;
printf("%10.8f",$time);



function factorial($number){
    $result= 1;
    for($i=1;$i<=$number;$i++){
        $result *=$i;
    }
    
    return $result;
}
