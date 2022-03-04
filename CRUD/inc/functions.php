<?php

// This function will work for data seeding
define('DB_NAME', "/Users/anim/Desktop/PHP_Projects/CRUD/data/cruddata.txt");

function seed(string $filename)
{
    $data = array(
        array(
            'fname' => 'Tansim',
            'lname'  => "Anjum",
            'Id'    => '182014024',
            'Dept'  => 'CSE'

        ),
        array(
            'fname' => 'Areeb',
            'lname'  => "Ahmed Quraishi",
            'Id'    => '182012653',
            'Dept'  => 'BBA'

        ),
        array(
            'fname' => 'Maria',
            'lname'  => "Kabir",
            'Id'    => '193012356',
            'Dept'  => 'BBA'

        ),
        array(
            'fname' => 'Tansim',
            'lname'  => "Anjum",
            'Id'    => '182014024',
            'Dept'  => 'BBA'

        ),
        array(
            'fname' => 'Morsalin',
            'lname'  => "Mabir",
            'Id'    => '182012361',
            'Dept'  => 'BBA'

        ),
        array(
            'fname' => 'Faruq',
            'lname'  => "Ahmed",
            'Id'    => '173256912',
            'Dept'  => 'MSJ'

        ),
        array(
            'fname' => 'Aishwariya',
            'lname'  => "Farahi",
            'Id'    => '182014081',
            'Dept'  => 'CSE'

        ),
        array(
            'fname' => 'Soyoda',
            'lname'  => "Benozir Alam",
            'Id'    => '18223658',
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