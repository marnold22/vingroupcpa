<?php
    // This is to validate that if a users is not logged in they cannot access page and are redirected to the login page
    
    // Initialize the session
    session_start();

    // Check if the user is logged in, if not then redirect him to login page
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: admin_login.php");
        exit;
    }
?>