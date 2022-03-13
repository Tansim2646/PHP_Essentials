<p>



<div class="float-left">

    <a href="/CRUD__v2/index.php?task=report">All Students</a> |
    <a href="/CRUD__v2/index.php?task=add">Add Student</a> |
    <a href="/CRUD__v2/index.php?task=seed">Seed</a>

</div>
<div class="float-right">
    <?php if ($_SESSION['loggedIn'] == 1) : ?>
        <a href="./auth.php?logout=true">Logout(<?php echo $_SESSION['username']; ?>)</a>
    <?php else : ?>
        <a href="./auth.php">Login</a>
    <?php endif; ?>

</div>
</p>