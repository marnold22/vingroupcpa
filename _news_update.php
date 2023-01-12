<?php

require_once 'db_connect.php';

// String Sanatize Function
function InputCleaner($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// ------------------------------ START EDIT NEWS POST ------------------------------ //
// Define variables and initialize with empty string values
$editTitle = $editImage = $editContent = $editLink = "";
$editTitle_err = $editImage_err = $editContent_err = "";
$editTarget_dir = "assets/news/";

// Check for EditNews $_POST
if (isset($_POST['EDITNEWS'])) {

    //Get id of which post is being edited
    $postid = $_GET['id'];

    // Validate Title by checking if empty
    if (empty($_POST['etitle'])) {
        $editTitle_err = "Title must be provided. ";
    } else {
        $editTitle = InputCleaner($_POST['etitle']);
    }

    // Validate Content by checking if empty
    if (empty($_POST['econtent'])) {
        $editContent_err = "Content must be provided. ";
    } else {
        $editContent = InputCleaner($_POST['econtent']);
    }

    // Validate Link by checking if empty
    if(empty($_POST['elink'])) {
        $editLink = "";
    } else {
        $editLink = $_POST['elink'];
    }

    // Validate Image by checking if empty
    if (empty($_FILES['eimage'])) {
        // $editImage = "assets/news/news-default.jpg";
        
        // Use original post image
        $sql = "SELECT picture FROM news WHERE id='$postid'";
        if ($result = mysqli_query($connect, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    // Set original post image
                    $editImage = $row['picture'];
                }
            }
        } else {
            // Else fallback to default image
            $editImage = "assets/news/news-default.jpg";
        }
    } else {
        // Set up image for sanitization and saving
        $file_name = $_FILES['eimage']['name'];
        $file_size = $_FILES['eimage']['size'];
        $file_tmp = $_FILES['eimage']['tmp_name'];
        $file_type = $_FILES['eimage']['type'];
        $file_ext_raw = explode('.', $_FILES['eimage']['name']);
        $file_ext = strtolower(end($file_ext_raw));
        $extensions = array("jpeg", "jpg", "png");

        // Check to make sure file meets specifications
        if (!in_array($file_ext, $extensions)) {
            $editImage_err = "Extension not allowed, please choose a JPG, JPEG, or PNG file. ";
        } elseif ($file_size > 10485760) {
            $editImage_err .= "File size must be less than 10 MB. ";
        } else {
            $editImage_err = "";
        }

        // Upload image if there are not any errors
        if (empty($editImage_err)) {
            move_uploaded_file($file_tmp, "assets/news/" . $file_name);
            $editImage = "assets/news/" . $file_name;
        } else {
            $editImage_err = "Image could not successfully be uploaded. ";
        }

    }

    // Check there are no errors and run SQL statement
    if (empty($editTitle_err) && empty($editContent_err) && empty($editImage_err)) {

        // Prepair SQL Update Statement
        $sql = "UPDATE `news` SET 
        `title` = '$editTitle', 
        `picture` = '$editImage', 
        `content` = '$editContent', 
        `link` = '$editLink'
        WHERE `id` = '$postid'";

        // Run SQL Statement
        if (mysqli_query($connect, $sql)) {
            header("location: admin_news.php");
        } else {
            echo "ERROR: Could not execute" . $sql. "statement due to" . mysqli_error($connect);
        }
        mysqli_close($connect);
    } else {
        $editError_output = $editTitle_err . $editContent_err . $editImage_err; 
    }
}

// ------------------------------ END EDIT NEWS POST ------------------------------ //
?>