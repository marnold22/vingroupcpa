<?php

    // Include config file
    require_once 'db_connect.php';

    // Define variables and initialize with empty values
    $title = $content = $image = "";
    $title_err = $content_err = $image_err = "";



    $target_dir = "assets/news/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

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

        // Validate Title
        if (empty(trim($_POST["ctitle"]))) {
            $title_err = "Please enter a title.";
        } else {
            $raw_title = trim($_POST["ctitle"]);
            $title = StringInputCleaner($raw_title);
            $title = mysqli_real_escape_string($connect, $title);
        }

        // Validate Image
        if (empty(trim($_POST["cimage"]))) {
            $image = "assets/news/news-default.jpg";
        } else {

            // Check File Type
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
                $uploadOk = 0;
            }else {
                // Check File Size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                } else {
                    $uploadOk = 1;
                }
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $file = $target_dir . basename( $_FILES["fileToUpload"]["name"]);
                } else {
                echo "Sorry, there was an error uploading your file.";
                }
            }

        
        }

        // Validate Content
        if (empty(trim($_POST["ccontent"]))) {
            $content_err = "Please enter content.";
        } else {
            $raw_content = trim($_POST["ccontent"]);
            $content = StringInputCleaner($raw_content);
            $content = mysqli_real_escape_string($connect, $content);
        }

        // Check to make sure no errors
        if (empty($title_err) && empty($image_err) && empty($content_err)) {

            //Prepair SQL Insert Statement
            $sql = "INSERT INTO news (title, image, content) VALUES ('$title', '$image', '$content')";
            if(mysqli_query($connect, $sql)) {
                // Redirect to admin_news page
                header("location: admin_news.php");
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
            }

            // Close connection
            mysqli_close($connect);            
        }
    }
