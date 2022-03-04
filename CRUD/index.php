<?php 
// There is a subtle diffference between include_once and required_once
// The program will run and will give warning if there no required file in include_once
// Thie program will not run if there is no required file required _once which fatal error

require_once('inc/functions.php');
$info = '';
$task = $_GET['task'] ?? 'report';
if('seed'==$task){
    seed(DB_NAME);
    $info = "File has been seeded";
    
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <style>
        body{
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h1>Project - 2 CRUD</h1>
                <p>In this simple project we will create a simple crud project</p>
                <?php include_once('inc/templates/nav.php'); ?>
                <hr>
                <?php if(!empty($info)){
                    echo "<p>File has been seeded </p>";
                }
                ?>    
                
            </div>
        </div>
        <?php if('report' == $task):
        ?>
        <div class="row">
            <div class="column cloumn-50 column-offset-20">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Department</th>
                        <th>Option</th>
                    </tr>
                    <?php   
                      $unseralizeData = report();
                      foreach($unseralizeData as $studentData){
                          ?>
                          <tr>
                          <td><?php printf("%s %s",$studentData['fname'],$studentData['lname']) ?></td>
                          <td><?php echo $studentData['Id'] ?></td>
                          <td><?php echo $studentData['Dept'] ?></td>
                          <td><?php printf("<a href='index.php?task=edit&id=%s'>Edit</a> | <a href='index.php?task=delete&id=%s'>Delete</a>",$studentData['Id'],$studentData['Id']) ?></td>
                        </tr>
                       <?php   
                      }
                    
                    ?>
                    
                </table>
            </div>
        
        
        </div>

        <?php



        endif;
        ?>
    </div>

</body>

</html>