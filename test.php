<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

session_start();


$_SESSION['a']= 12;

$_SESSION['b']= "test";


if(isset($_SESSION['a'])) 
{
    echo 'hello';
}
if(isempty($_SESSION['a'])) echo 'hi';

session_destroy();

?>