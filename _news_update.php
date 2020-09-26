<?php

// Include config file
require_once 'db_connect.php';

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


// ------------------------------ START EDIT NEWS POST ------------------------------ //
// Define variables and initialize with empty values
$editTitle = $editImage = $editContent = "";
$editTitle_err = $editImage_err = $editContent_err = $editGlobal_err = "";
$editTarget_dir = "assets/news/";
$editImg_upload = 1;

if (isset($_POST['editnews'])) {

    //Get id of which post is being edited
    $postid = $_GET['id'];
    

    // Validate Title
    if (!isset($_POST["stitle"])) {
        $editTitle_err = "Title cannot be left blank, please enter a title. ";
    } else {
        $raw_title = trim($_POST["stitle"]);
        $editTitle = StringInputCleaner($raw_title);
        $editTitle = mysqli_real_escape_string($connect, $editTitle);
    }


    // Validate Image
    if(isset($_FILES['simage'])){
        
        $file_name = $_FILES['simage']['name'];
        $file_size = $_FILES['simage']['size'];
        $file_tmp = $_FILES['simage']['tmp_name'];
        $file_type = $_FILES['simage']['type'];
        $file_ext = strtolower(end(explode('.',$_FILES['simage']['name'])));
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
           $editImage_err .= "extension not allowed, please choose a JPEG or PNG file. ";
        }
        
        if($file_size > 2097152){
           $editImage_err .= "File size must be less than 2 MB ";
        }
        
        if(empty($editImage_err) == true){
           move_uploaded_file($file_tmp,"assets/news/".$file_name);
           $editImage = "assets/news/" . $file_name;
        }else{
            $editImage_err .= "Image could not be uploaded. ";
        }
    }else {
        // Use original post image
        // Query for original post image
        $sql = "SELECT image FROM news WHERE id='$postid'";
        if ($result = mysqli_query($connect, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    // Set original post image
                    $editImage = $row['image'];
                }
            }
        }
    }


    // Validate Content
    if (!isset($_POST["scontent"])) {
        $editContent_err = "Content cannot be left blank, please enter a body message. ";
    } else {
        $raw_content = trim($_POST["scontent"]);
        $editContent = StringInputCleaner($raw_content);
        $editContent = mysqli_real_escape_string($connect, $editContent);
    }

    // Check to make sure nothing is left blank
    if (empty($editTitle) || empty($editContent)) {
        $editGlobal_err = "No fields can be left empty, please make sure to include all fields. ";
    } else {
        $editGlobal_err = "";
    }

    if (!empty($editTitle_err) || !empty($editImage_err) || !empty($editContent_err) || !empty($editGlobal_err)) {
        $editError_output = "ERRORS: " . $editTitle_err . " " . $editImage_err . " " . $editContent_err . " " . $editGlobal_err;
    } else {
        
        // Prepair SQL Update Statement
        $sql = "UPDATE `news` SET 
                `title` = '$editTitle', 
                `image` = '$editImage', 
                `content` = '$editContent' 
                WHERE `id` = '$postid'";

        if (mysqli_query($connect, $sql)) {
            // Redirect to admin_news page
            header("location: admin_news.php");
        } else {
            echo "ERROR: Could not execute $sql. " . mysqli_error($connect);
        }
    
        // Close connection
        mysqli_close($connect);
    }
}
// ------------------------------ END EDIT NEWS POST ------------------------------ //

?>