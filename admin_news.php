<?php include("_admin_check_loggedout.php") ?>

<?php

// Include config file
require_once 'db_connect.php';

// Global functions:
// 1.) Sanitizes user input
function StringInputCleaner($data)
{
    //remove space bfore and after
    $data = trim($data);
    //remove slashes
    $data = stripslashes($data);
    $data = (filter_var($data, FILTER_SANITIZE_STRING));
    return $data;
}


// ------------------------------ START ADD NEWS POST ------------------------------ //
// Define variables and initialize with empty values
$addTitle = $addImage = $addContent = "";
$addTitle_err = $addImage_err = $addContent_err = $addGlobal_err = "";
$target_dir = "assets/news/";
$img_upload = 1;

if (isset($_POST['addnews'])) {
    // Validate Title
    if (!isset($_POST["atitle"])) {
        $addTitle_err = "Title cannot be left blank, please enter a title.";
    } else {
        $raw_title = trim($_POST["atitle"]);
        $addTitle = StringInputCleaner($raw_title);
        $addTitle = mysqli_real_escape_string($connect, $addTitle);
    }


    // Validate Image
    if (isset($_FILES['aimage'])) {

        $file_name = $_FILES['aimage']['name'];
        $file_size = $_FILES['aimage']['size'];
        $file_tmp = $_FILES['aimage']['tmp_name'];
        $file_type = $_FILES['aimage']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['aimage']['name'])));

        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $addImage_err .= "extension not allowed, please choose a JPEG or PNG file. ";
        }

        if ($file_size > 2097152) {
            $addImage_err .= "File size must be less than 2 MB ";
        }

        if (empty($addImage_err) == true) {
            move_uploaded_file($file_tmp, "assets/news/" . $file_name);
            $addImage = "assets/news/" . $file_name;
        } else {
            $addImage_err .= "Image could not be uploaded. ";
        }
    }


    // Validate Content
    if (!isset($_POST["acontent"])) {
        $addContent_err = "Content cannot be left blank, please enter a body message. ";
    } else {
        $raw_content = trim($_POST["acontent"]);
        $addContent = StringInputCleaner($raw_content);
        $addContent = mysqli_real_escape_string($connect, $addContent);
    }

    // Check to make sure nothing is left blank
    if (empty($addTitle) || empty($addImage) || empty($addContent)) {
        $addGlobal_err = "No fields can be left empty, please make sure to include all fields. ";
    } else {
        $addGlobal_err = "";
    }

    if (!empty($addTitle_err) || !empty($addImage_err) || !empty($addContent_err) || !empty($addGlobal_err)) {
        $addError_output = "ERRORS: " . $addTitle_err . " " . $addImage_err . " " . $addContent_err . " " . $addGlobal_err;
    } else {
        //Prepair SQL Insert Statement
        $sql = "INSERT INTO news (title, picture, content) VALUES ('$addTitle', '$addImage', '$addContent')";
        
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
// ------------------------------ END ADD NEWS POST ------------------------------ //
?>

<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<?php include("modules/admin_head.php") ?>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="admin.php">Vingroupcpa Admin</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa fa-window-maximize"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Admin</div>
                        <a class="nav-link" href="admin.php" aria-expanded="false">Home</a>
                        <a class="nav-link" href="admin_news.php" aria-expanded="false">News Posts</a>
                        <a class="nav-link" href="admin_users.php" aria-expanded="false">Users Table</a>
                        <a class="nav-link" href="admin_reset_password.php" aria-expanded="false">Password Resset</a>
                        <a class="nav-link" href="admin_register.php" aria-expanded="false">Register</a>
                        <a class="nav-link" href="admin_logout.php" aria-expanded="false">Logout</a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo htmlspecialchars($_SESSION["username"]); ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <!-- PAGE UNIQUE CONTET GOES HERE -->



            <!-- START TABLE -->
            <div class="container">
                <div class="table-card">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2 class="news-header">Manage <b>News Posts</b></h2>
                            </div>
                            <div class="col-sm-6">
                                <a id="news-btn" href="#addNewsModal" class="btn btn-success tbl-btn" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i><span> Add News Post</span></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p><?php if (!empty($addError_output)) {
                                        echo $addError_output;
                                    } ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Post ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Picture</th>
                                    <th scope="col">TOOLS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- START LOOP -->
                                <?php
                                // Attempt select query execution
                                $sql = "SELECT * FROM news";
                                if ($result = mysqli_query($connect, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td class='overflow'>" . $row['id'] . "</td>";
                                            echo "<td class='overflow'>" . $row['title'] . "</td>";
                                            echo "<td class='overflow'>" . $row['content'] . "</td>";
                                            echo "<td class='overflow'>" . $row['picture'] . "</td>";
                                            echo "<td class='overflow'>
                                                <a href='#editNewsModal-" . $row['id'] . "' data-toggle='modal'><i class='fa fa-pencil' aria-hidden='true'></i></a>
                                                <a href='#deleteNewsModal-" . $row['id'] . "' data-toggle='modal'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
                                            echo "</tr>";
                                        }
                                        // Free result set
                                        mysqli_free_result($result);
                                    } else {
                                        echo "No records matching your query were found.";
                                    }
                                } else {
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                }
                                ?>
                                <!-- END LOOP -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End of Table -->




            <!-- ******************** START ALL MODALS ******************** -->
            <!-- ADD MODAL -->
            <div id="addNewsModal" class="modal fade news-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h4 class="modal-title">Create News Post</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="atitle" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Picture</label>
                                    <input name="aimage" type="file" class="form-control-file" required>
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="acontent" class="form-control" placeholder="Content Body Here..." rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" name="addnews" class="btn btn-success" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- EDIT MODAL -->
            <!-- Need to loop through db news posts and generate unique modal for each post -->
            <?php
            $sql = "SELECT * FROM news";
            if ($result = mysqli_query($connect, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) { ?>

                        <div id="editNewsModal-<?= $row['id']; ?>" class="modal fade news-modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="_news_update.php?id=<?= $row['id']; ?>" method="POST" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit News Post</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input name="etitle" type="text" class="form-control" value="<?= $row['title']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Picture</label>
                                                <input name="eimage" type="file" class="form-control-file" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Content</label>
                                                <textarea name="econtent" class="form-control" value="" rows="5" required> <?= $row['content']; ?> </textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                            <input type="submit" name="editnews" class="btn btn-info" value="Save">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Closing brackets -->
            <?php
                    }
                    // Free result set
                    mysqli_free_result($result);
                }
            }
            ?>

            <!-- DELETE MODAL -->
            <!-- Need to loop through db news posts and generate unique modal for each post -->
            <?php
            $sql = "SELECT * FROM news";
            if ($result = mysqli_query($connect, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) { ?>

                        <div id="deleteNewsModal-<?= $row['id']; ?>" class="modal fade news-modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="_news_delete.php?id=<?= $row['id']; ?>" method="POST">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete News Post</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this record?</p>
                                            <p>ID = <?= $row['id']; ?></p>
                                            <p>Title = <?= $row['title']; ?></p>
                                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                            <input type="submit" name="deletenews" class="btn btn-danger" value="Delete">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Closing brackets -->
            <?php
                    }
                    // Free result set
                    mysqli_free_result($result);
                }
            }
            ?>
            <!-- ******************** END ALL MODALS ******************** -->
        </div>
    </div>

    <!-- Scripts -->
    <?php include("modules/scripts.php") ?>
    <script>
        jQuery(document).ready(function($) {
            var alterClass = function() {
                var ww = document.body.clientWidth;
                if (ww < 600) {
                    $('#news-btn').addClass('btn-block');
                } else if (ww >= 601) {
                    $('#news-btn').removeClass('btn-block');
                };
            };
            $(window).resize(function() {
                alterClass();
            });
            //Fire it when the page first loads:
            alterClass();
        });
    </script>
    
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>