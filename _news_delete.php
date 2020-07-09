<?php

// Include config file
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //to protect from mysql injections
    $id = trim($_POST['news-posts']);

    //Prepair SQL Delete Statement
    $sql = "DELETE FROM news WHERE id='$id'";

    if (mysqli_query($connect, $sql)) {
        // Redirect to admin_news page
        header("location: admin_news.php");
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    }

    // Close connection
    mysqli_close($connect);
}

?>