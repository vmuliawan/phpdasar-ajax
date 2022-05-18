<?php 
    
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    require 'fungsi.php';

    header("Location: login.php");
    exit;

?>