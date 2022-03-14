<p>



<div class="float-left">

    <a href="/CRUD__v2/index.php?task=report">All Students</a> 
    <?php if(isAdmin() || isEditor()): ?>
    |
    <a href="/CRUD__v2/index.php?task=add">Add Student</a> 
    <?php endif; ?>
    <?php if(isAdmin()): ?>
    |
    <a href="/CRUD__v2/index.php?task=seed">Seed</a>
    <?php endif; ?>


</div>
<div class="float-right">
    <?php if ($_SESSION['loggedIn'] == 1) : ?>
        <a href="./auth.php?logout=true">Logout(<?php echo $_SESSION['role']; ?>)</a>
    <?php else : ?>
        <a href="./auth.php">Login</a>
    <?php endif; ?>

</div>
</p>