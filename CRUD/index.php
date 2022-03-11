<?php
// There is a subtle diffference between include_once and required_once
// The program will run and will give warning if there no required file in include_once
// Thie program will not run if there is no required file required _once which fatal error

require_once('inc/functions.php');
$info = '';
$task = $_GET['task'] ?? 'report';
$error = $_GET['error'] ?? '0';
if ('seed' == $task) {
    seed(DB_NAME);
    $info = "File has been seeded";
}
// Value for usage
$fname = '';
$lname = '';
$id = '';
$dept = '';
// Adding new student
if (isset($_POST['submit'])) {
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $id = htmlspecialchars($_POST['id']);
    $dept = htmlspecialchars($_POST['dept']);
    $index = htmlspecialchars($_POST['index']);

    if($index){

        if ($fname !== '' && $lname !== '' && $id !== '' && $dept !== ''){
            $result=updateStudent($index,$fname,$lname,$id,$dept);
            if($result){
                header('location: /CRUD/index.php?task=report');
            }else{
                $error = '1';
            }
        }

        
    }else{

        if ($fname !== '' && $lname !== '' && $id !== '' && $dept !== '') {
            $result  = addStudents($fname, $lname, $id, $dept);
            if ($result) {
                header('location: /CRUD/index.php?task=report');
            } else {
                $error = '1';
            }
        }

    }
    


    }     

     

?>
<!-- Delete Function -->
<?php if('delete' === $task){
    $index = filter_input(INPUT_GET,'index',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if($index>0){
        deleteStudent($index);
        header('location: /CRUD/index.php?task=report');
    }
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
        body {
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
                <?php if (!empty($info)) {
                    echo "<p>File has been seeded </p>";
                }
                ?>

            </div>
        </div>
        <?php if ('1' == $error) {
        ?>
            <div class="row">
                <div class="column column-50 column-offset-20">
                    <blockquote>
                        Duplicate entry found
                    </blockquote>
                </div>
            </div>
        <?php
        }
        ?>
        <?php if ('report' == $task && '0' == $error) :
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
                        foreach ($unseralizeData as $studentData) {
                        ?>
                            <tr>
                                <td><?php printf("%s %s", $studentData['fname'], $studentData['lname']) ?></td>
                                <td><?php echo $studentData['Id'] ?></td>
                                <td><?php echo $studentData['Dept'] ?></td>
                                <td><?php printf("<a  href='index.php?task=edit&index=%s'>Edit</a> | <a class='link' href='index.php?task=delete&index=%s'>Delete</a>", $studentData['index'], $studentData['index']) ?></td>

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
        <?php if ('add' == $task || '2' == $error) :
        ?>
            <div class="row">
                <div class="column column-50 column-offset-20">
                    <form method="POST" action="/CRUD/index.php?task=add">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" id="fname" value=<?php echo $fname; ?>>
                        <label for="lname">Last name</label>
                        <input type="text" name="lname" id="lname" value=<?php echo $lname; ?>>
                        <label for="id">Id</label>
                        <input type="number" name="id" id="id" value=<?php echo $id; ?>>
                        <label for="dept">Department</label>
                        <input type="text" name="dept" id="dept" value=<?php echo $dept; ?>>
                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        <?php endif ?>

        <!-- edit student -->
        <?php if ('edit' == $task) :

            $index = filter_input(INPUT_GET,'index',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $student = getStudent($index);

            if ($student) :

        ?>
                <div class="row">
                    <div class="column column-50 column-offset-20">
                        <form  method="POST">
                            <!-- This hidden filed is being added for check whether it is in update mode or added mode -->
                            <input type="hidden" name="index" id="index" value="<?php echo $student['index']; ?>">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname" value=<?php echo $student['fname']; ?>>
                            <label for="lname">Last name</label>
                            <input type="text" name="lname" id="lname" value=<?php echo $student['lname']; ?>>
                            <label for="id">Id</label>
                            <input type="number" name="id" id="id" value=<?php echo $student['Id']; ?>>
                            <label for="dept">Department</label>
                            <input type="text" name="dept" id="dept" value=<?php echo $student['Dept']; ?>>
                            <input type="submit" name="submit" value="update">

                        </form>
                    </div>
                </div>






        <?php endif;
        endif;
        ?>

    </div>

    <script src="assets/Js/script.js"></script>

</body>


</html>