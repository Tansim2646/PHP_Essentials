<?php
error_reporting(E_ERROR | E_PARSE);
session_name("Tansim");
session_start();
$error = 0;
// session_destroy();
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
// File Reading
$fp = fopen('./data/users.txt','r');
if($username && $password){
    while($data = fgetcsv($fp)){
        
        if($data[0] == $username && $data[1] == sha1($password)){
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $username;
            header('location:index.php');
        }
    }
    if(!$_SESSION['loggedIn']){
            $error =1;
            $_SESSION['loggedIn'] = false;
    
    }
}
// logout funtionality
if(isset($_POST['logout'])  && $_POST['logout']){
    
    $_SESSION['loggedIn'] = false;
    session_destroy();
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
    <title>CRUD APPLICATION</title>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="column column-50 column-offset-20">
                <h1>Simple Auth Example</h1>
    
            </div>
        </div>
        
        <div class="row">
            <div class="column column-50 column-offset-20">
                <?php if( isset($_SESSION['loggedIn'])  &&  $_SESSION['loggedIn']){
                    echo "Hello Admin,Welcome ";
                }else{
                    echo "Hello Stranger,Please Login First";
                }
                ?>
    
            </div>
        </div>
        <!-- for error -->
        <div class="row">
            <div class="column column-50 column-offset-20">
                <?php if(1 === $error): ?>
                    <blockquote>Credentials doesn't match</blockquote>
                <?php endif; ?>
                
            </div>
        </div>
        <!-- For form -->
        <?php if(!isset($_SESSION['loggedIn']) || false == $_SESSION['loggedIn']): ?>
        <div class="row">
            <div class="column column-50 column-offset-20">
                <form method="POST">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <input type="submit" value="Login">
                </form>
            </div>
        </div>
        <?php else: ?>
            <div class="row">
                <div class="column column-50 column-offset-20">
                    <form method="POST">

                        <input type="submit" name="logout" value="Log Out">
                    </form>
                </div>
            </div>
            <?php endif; ?>

    </div>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</body>

</html>