<?php

// Include config file
require_once 'db_connect.php';

if (isset($_POST['DELETENEWS'])) {
    //to protect from mysql injections
    $id = $_GET['id'];

    //Prepair SQL Delete Statement
    $sql = "DELETE FROM news WHERE id='$id'";

    if (mysqli_query($connect, $sql)) {
        // Redirect to admin_news page
        header("location: admin_news.php");
    } else {
        // Output errors
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    }

    // Close connection
    mysqli_close($connect);
}

?>