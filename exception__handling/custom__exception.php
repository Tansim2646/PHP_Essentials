<?php
class Myexception extends Exception{};
class Networkexception extends Exception{};

function runException(){
    throw new Networkexception();
}

// Since we know thsat this partivular function will throw ecpetion, here,we can invoke this function inside try cath block

try{
    runException();
}catch(Exception $m){
    echo "Exception happend \n";
    
}catch(Networkexception $n){
    echo "Networkexception happend \n";
}finally{
    echo "Try catch block exited\n";
}