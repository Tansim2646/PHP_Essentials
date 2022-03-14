<?php
// functions for seeding

// file location as a constant

define('DATA_STORAGE',"/Users/anim/Desktop/PHP_Projects/CRUD__V2/data/cruddata.txt");

function seeding(){
    $data = array(
        array(
            'index' => '1',
            'fname' => 'Tansim',
            'lname'  => "Anjum",
            'Id'    => '182014024',
            'Dept'  => 'CSE'
    
        ),
        array(
            'index' => '2',
            'fname' => 'Areeb',
            'lname'  => "Ahmed Quraishi",
            'Id'    => '182014025',
            'Dept'  => 'BBA'
    
        ),
        array(
            'index' => '3',
            'fname' => 'Maria',
            'lname'  => "Kabir",
            'Id'    => '182014026',
            'Dept'  => 'BBA'
    
        ),
        array(
            'index' => '4',
            'fname' => 'Tansim',
            'lname'  => "Anjum",
            'Id'    => '182014027',
            'Dept'  => 'BBA'
    
        ),
        array(
            'index' => '5',
            'fname' => 'Morsalin',
            'lname'  => "Mabir",
            'Id'    => '182014027',
            'Dept'  => 'BBA'
    
        ),
        array(
            'index' => '6',
            'fname' => 'Faruq',
            'lname'  => "Ahmed",
            'Id'    => '182014028',
            'Dept'  => 'MSJ'
    
        ),
        array(
            'index' => '7',
            'fname' => 'Aishwariya',
            'lname'  => "Farahi",
            'Id'    => '182014029',
            'Dept'  => 'CSE'
    
        ),
        array(
            'index' => '8',
            'fname' => 'Soyoda',
            'lname'  => "Benozir Alam",
            'Id'    => '182014030',
            'Dept'  => 'DEH'
    
        ),
    );
    putdata($data);
    return true;
    
}

// function for putting data

function putdata($data){
    $serializeData = serialize($data);
    file_put_contents(DATA_STORAGE,$serializeData,LOCK_EX);
    
}

// function for reading data from the file

function readData(){
    $data = file_get_contents(DATA_STORAGE);
    $unserializeData = unserialize($data);
    return $unserializeData;
}

// function for adding student 
function addStudent($fname,$lname,$id,$dept){
    $found = false;
    $newStudent = array(
        'index' => getIndex(),
        'fname' => $fname,
        'lname' => $lname,
        'Id' => $id,
        'Dept' => $dept
    );
    $fileData = readData();
    //Checking for duplicate ID
    foreach($fileData as $_data){
        if($_data['Id']===$id){
            $found = true;
            break;
        }
    }

    if(!$found){
        array_push($fileData,$newStudent);
        putdata($fileData);
        return true;
    }


    return false;

}

// fucntion for getting index
function getIndex(){
    $data = readData();
    $index = max(array_column($data,'index'))+1;
    return $index;
}
// function for updating student
function updateStudent($fname,$lname,$id,$dept,$index){
    $found = false;
    $data = readData();
    //Checking for duplicate ID
    foreach($data as $_data){
        if($_data['Id']===$id  &&  $_data['index'] != $index){
            $found = true;
            break;
        }
    }
    if(!$found){
        
        $data[$index - 1]['fname'] = $fname;
        $data[$index - 1]['lname'] = $lname;
        $data[$index - 1]['Id'] = $id;
        $data[$index - 1]['Dept']=$dept;
        putdata($data);
        return true;
    }
    return false;
}
// function for delete data

function deleteData($index){
    $data = readData();
    unset($data[$index-1]);
    putdata($data);
}

// function for checking admin
function isAdmin(){
    return ('admin' == $_SESSION['role']);
}
// function for checking editor
function isEditor(){
    return ('editor'==$_SESSION['role']);
}