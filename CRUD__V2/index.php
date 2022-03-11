<!-- PHP -->
<?php
$error = '0';
$seed = false;
require_once('/Users/anim/Desktop/PHP_Projects/CRUD__V2/inc/functions.php');
$task = $_GET['task'] ?? 'report';
if('seed'===$task){
    $seed = seeding();

}

if(isset($_POST['submit'])){
    // checking whether it is coming form update form or add student form
    if(isset($_POST['index'])){
        if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['id']) && !empty($_POST['dept'])){
            $fname = htmlspecialchars($_POST['fname']);
            $lname = htmlspecialchars($_POST['lname']);
            $id = htmlspecialchars($_POST['id']);
            $dept = htmlspecialchars($_POST['dept']);
            $index = htmlspecialchars($_GET['index']);
            $result = updateStudent($fname,$lname,$id,$dept,$index);
            if($result){
                header('location: /CRUD__v2/index.php?task=report');
            }else{
    
                $error = '1';
            }
        }
    }else{
        if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['id']) && !empty($_POST['dept'])){
            $fname = htmlspecialchars($_POST['fname']);
            $lname = htmlspecialchars($_POST['lname']);
            $id = htmlspecialchars($_POST['id']);
            $dept = htmlspecialchars($_POST['dept']);
            $result = addStudent($fname,$lname,$id,$dept);
            if($result){
                header('location: /CRUD__v2/index.php?task=report');
            }else{
    
                $error = '1';
            }
        }
    }
}

// delete functionality

if('delete'==$task){
    $index = htmlspecialchars($_GET['index']);
    deleteData($index);
    header('location: /CRUD__v2/index.php?task=report');

}


?>





<!-- Main Body -->
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
    <title>CRUD Application</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h1>CRUD Application</h1>
                <p>In this simple project we will create a simple CRUD Project</p>
            </div>
        </div>
        <!-- Here we are importing nav template -->
        <div class="row">
            <div class="column column-60 column-offset-20">
                <?php include_once('/Users/anim/Desktop/PHP_Projects/CRUD__V2/inc/Template/nav.php'); ?>
            </div>
        </div>
        <!-- Seeding quoute -->
        <?php if($seed): ?>
        <div class="row">
            <div class="column column-60 column-offset-20">
                <blockquote>File is seeded</blockquote>
            </div>
        </div>
        <?php endif; ?>
        <!-- reprot -->
        <?php if('report'===$task):
           $students = readData();
           ?>

           <div class="row">
            <div class="column column-60 column-offset-20">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Department</th>
                        <th>Option</th>

                    </tr>
                    <?php foreach($students as $student){
                        ?>
                        <tr>
                          <td><?php printf("%s %s",$student['fname'],$student['lname']); ?></td>
                          <td><?php echo $student['Id']; ?></td>
                          <td><?php echo $student['Dept']; ?></td>
                          <td><a href="/CRUD__v2/index.php?task=edit&index=<?php echo $student['index']?>">Edit</a> | <a class="delete" href="/CRUD__v2/index.php?task=delete&index=<?php echo $student['index']?>">Delete</a></td>
                          
                        
                        </tr>

                   <?php } ?>
                    
                    
                </table>
            
            
            
            </div>
           
           </div>
           <?php endif; ?>
           <!-- Report ends here -->
           
           <!-- Add students -->
           <?php if('add'===$task):?>
            <div class="row">
                <div class="column column-50 column-offset-20">
                    <?php if($error == '1'): ?>
                        <blockquote>Invalid Id</blockquote>
                        <?php endif; ?>
                    
                    <form action="/CRUD__V2/index.php?task=add" method="POST">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" id="fname">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" id="lname">
                        <label for="id">ID</label>
                        <input type="text" name="id" id="id">
                        <label for="dept">Department</label>
                        <input type="text" name="dept" id="dept">
                        <input type="submit" value="Submit" name="submit">
                    </form>
                </div>
            </div>
            <?php endif; ?>

            <!-- Edit Form -->
            <?php if('edit'===$task):
                $students = readData();
                $index = $_GET['index'];
                $student = $students[$index-1];
                
                
                ?>
                <div class="row">
                    <div class="column column-60 column-offset-20">
                    <?php if($error == '1'): ?>
                        <blockquote>Id existed with different credentials</blockquote>
                        <?php endif; ?>

                        <form method="POST">
                                 <input type="hidden" name="index" value="<?php $student['index']; ?>">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" id="fname" value="<?php echo $student['fname']; ?>">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" id="lname" value="<?php echo $student['lname']; ?>">
                                <label for="id">ID</label>
                                <input type="text" name="id" id="id" value="<?php echo $student['Id']; ?>">
                                <label for="dept">Department</label>
                                <input type="text" name="dept" id="dept" value="<?php echo $student['Dept']; ?>">
                                <input type="submit" value="Update" name="submit">
                            </form>


                    </div>
                </div>

             <?php endif; ?>   
            


        
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./Assets/JS/script.js"></script>


</body>

</html>