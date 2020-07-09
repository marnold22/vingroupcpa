<?php

// Include config file
require_once 'db_connect.php';


// Define variables and initialize with empty values
$title = $content = $image = "";
$title_err = $content_err = $image_err = "";

//To SANITIZE String value use
function StringInputCleaner($data)
{
    //remove space bfore and after
    $data = trim($data);
    //remove slashes
    $data = stripslashes($data);
    $data = (filter_var($data, FILTER_SANITIZE_STRING));
    return $data;
}


// Check for Post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postid = $_GET['id'];

    // Validate Title Update
    if (empty(trim($_POST["stitle"]))) {
        $title_err = "Please enter a title.";
    } else {
        $raw_title = trim($_POST["stitle"]);
        $title = StringInputCleaner($raw_title);
        $title = mysqli_real_escape_string($connect, $title);
    }

    // Validate Image Update
    if (empty(trim($_POST["simage"]))) {
        $image = "assets/news/news-default.jpg";
    } else {
        // Need to check to make sure only a picture file is uploaded
        // $image = trim($_POST["smedia"]);
        $image = "assets/news/news-default.jpg";
    }

    // Validate Content Update
    if (empty(trim($_POST["scontent"]))) {
        $content_err = "Please enter content.";
    } else {
        $raw_content = trim($_POST["scontent"]);
        $content = StringInputCleaner($raw_content);
        $content = mysqli_real_escape_string($connect, $content);
    }

    // Check to make sure no errors
    if (empty($title_err) && empty($image_err) && empty($content_err)) {

        // Prepair SQL Update Statement
        $sql = "UPDATE `news` SET 
                `title` = '$title', 
                `image` = '$image', 
                `content` = '$content' 
                WHERE `id` = '$postid'";

        if (mysqli_query($connect, $sql)) {
            // Redirect to admin_news page
            header("location: admin_news.php");
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
        }

        // Close connection
        mysqli_close($connect);
    }
}

?>