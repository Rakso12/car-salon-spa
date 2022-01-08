<?php
    session_start();
    
    unset($_SESSION["loggedin"]);
    $_SESSION = array();

    session_destroy();
    
    header("Location: http://localhost/carsalon/#!/sign-in");
    exit;
?>