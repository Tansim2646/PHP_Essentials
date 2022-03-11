<?php 
session_name('newsession');
// we can also set some parameter in session

session_start(array(
    'cookie_lifetime' => 30
));
// $_SESSION['name'] = 'Anim';

// manually destroy the session
// session_destroy();

// $_SESSION['counter'] = $_SESSION['counter'] ?? 0;
// $_SESSION['counter']++;
// echo $_SESSION['counter'];
// $_SESSION['name'] = 'Anim';
echo $_SESSION['name'];
