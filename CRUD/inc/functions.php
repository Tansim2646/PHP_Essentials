<?php

// This function will work for data seeding
define('DB_NAME', "/Users/anim/Desktop/PHP_Projects/CRUD/data/cruddata.txt");

function seed(string $filename)
{
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
    $serializeData = serialize($data);
    file_put_contents($filename, $serializeData, LOCK_EX);
}

// Function used for generate report
function report(){
    $serializeData = file_get_contents(DB_NAME);
    $unseralizeData = unserialize($serializeData);
    return $unseralizeData;
    
}

// FUnction for adding studnents
function addStudents($fname,$lname,$Id,$dept){
    $error = 0;
    $serializeData = file_get_contents(DB_NAME);
    $unserializeData = unserialize($serializeData);
    $found = false;
    
    foreach($unserializeData as $_data){
        if($_data['Id'] == $Id){
            $found = true;
            break;
        }
        


    }

    if(!$found){
        $newstudent = array(

            'index' => getIndex(),
            'fname' => $fname,
            'lname'  => $lname,
            'Id'    => $Id,
            'Dept'  => $dept
    
        );
        array_push($unserializeData,$newstudent);
        $serializeData = serialize($unserializeData);
        file_put_contents(DB_NAME,$serializeData,LOCK_EX);
        return true;
        
    }

    return false;
    


}

//  Getstudent function defination

function getStudent($index){
   $serializeData = file_get_contents(DB_NAME);
   $unserializeData = unserialize($serializeData);
   foreach($unserializeData as $student){
        if($student['index'] === $index){

            return $student;

        }
   }
   return false;
}

// funtion for updating student

function updateStudent($index,$fname,$lname,$id,$dept){
    $found = false;
    $serializeData = file_get_contents(DB_NAME);
    $unserializeData = unserialize($serializeData);
    foreach($unserializeData as $_data){
        if($_data['Id'] == $id && $_data['index'] !== $index){
            $found = true;
            break;
        }
    }
    if(!$found){
        $unserializeData[$index - 1]['fname'] = $fname;
        $unserializeData[$index - 1]['lname'] = $lname;
        $unserializeData[$index - 1]['Id'] = $id;
        $unserializeData[$index - 1]['Dept'] = $dept;
        $newData = serialize($unserializeData);
        file_put_contents(DB_NAME,$newData);
        return true;                            
        
    }
    return false;
}

// Defination of Delete Function

function deleteStudent($index){
    $fileData = file_get_contents(DB_NAME);
    $alldata = unserialize($fileData);
    unset($alldata[$index-1]);
    $newData = serialize($alldata);
    file_put_contents(DB_NAME,$newData,LOCK_EX);
}

// function for getting index number

function getIndex(){
    $fileData = file_get_contents(DB_NAME);
    $allData = unserialize($fileData);
    $index= max(array_column($allData,'index'));
    return $index+1;
}

