<?php include("_admin_check_loggedout.php") ?>
<?php

    require_once 'db_connect.php';

    // String Sanatize Function
    function InputCleaner($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = (filter_var($data, FILTER_SANITIZE_STRING));
        return $data;
    }


    // ------------------------------ START ADD NEWS POST ------------------------------ //
    // Define variables and initialize with empty values
    $addTitle = $addImage = $addContent = $addLink= "";
    $addTitle_err = $addImage_err = $addContent_err = "";
    $target_dir = "assets/news/";

    if (isset($_POST['ADDNEWS'])) {

        // Validate Title
        if (empty($_POST['atitle'])) {
            $addTitle_err = "Title must be provided. ";
        } else {
            $addTitle = InputCleaner($_POST['atitle']);
        }
        // Validate Content
        if (empty($_POST['acontent'])) {
            $addContent_err = "Content must be provided. ";
        } else {
            $addContent = InputCleaner($_POST['acontent']);
        }

        // Validate Link
        if (empty($_POST['alink'])) {
            $addLink = "";
        } else {
            $addLink = $_POST['alink'];
        }

        // Validate Image
        if (empty($_FILES['aimage'])) {
            $addImage = "assets/news/news-default.jpg";
        } else {
            $file_name = $_FILES['aimage']['name'];
            $file_size = $_FILES['aimage']['size'];
            $file_tmp = $_FILES['aimage']['tmp_name'];
            $file_type = $_FILES['aimage']['type'];
            $file_ext_raw = explode('.', $_FILES['aimage']['name']);
            $file_ext = strtolower(end($file_ext_raw));
            $extensions = array("jpeg", "jpg", "png");

            // Check to make sure file meets specifications
            if (!in_array($file_ext, $extensions)) {
                $addImage_err = "Extension not allowed, please choose a JPG, JPEG, or PNG file. ";
            } elseif ($file_size > 10485760) {
                $addImage_err .= "File size must be less than 10 MB. ";
            } else {
                $addImage_err = "";
            }

            // Upload image if there are not any errors
            if (empty($addImage_err)) {
                move_uploaded_file($file_tmp, "assets/news/" . $file_name);
                $addImage = "assets/news/" . $file_name;
            } else {
                $addImage_err = "Image could not successfully be uploaded. ";
            }

        }

        // Check there are no errors and run SQL statement
        if (empty($addTitle_err) && empty($addContent_err) && empty($addImage_err)) {
            //Prepair SQL Insert Statement
            $sql = "INSERT INTO news (title, picture, content, link) VALUES ('$addTitle', '$addImage', '$addContent', '$addLink')";

            // Run SQL Statement
            if (mysqli_query($connect, $sql)) {
                header("location: admin_news.php");
            } else {
                echo "ERROR: Could not execute" . $sql. "statement due to" . mysqli_error($connect);
            }
            mysqli_close($connect);
        } else {
            $addError_output = $addTitle_err . $addContent_err . $addImage_err; 
        }
    }
    // ------------------------------ END ADD NEWS POST --------------------------------- //

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
                            <div class="col-sm-12" style="color: red;">
                                <p><?php if (!empty($addError_output)) {
                                        echo $addError_output;
                                    } ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12" style="color: red;">
                                <p><?php if (!empty($editError_output)) {
                                        echo $editError_output;
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
                                    <th scope="col">Link</th>
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
                                            echo "<td class='overflow'>" . $row['link'] . "</td>";
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
                                    <input name="atitle" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Picture</label>
                                    <input name="aimage" type="file" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="acontent" class="form-control" placeholder="Content Body Here..." rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <input name="alink" type="text" class="form-control" placeholder="Link Here...">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" name="ADDNEWS" class="btn btn-success" value="Submit">
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
                                                <input name="etitle" type="text" class="form-control" value="<?= $row['title']; ?>" >
                                            </div>
                                            <div class="form-group">
                                                <label>Picture</label>
                                                <input name="eimage" type="file" class="form-control-file" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Content</label>
                                                <textarea name="econtent" class="form-control" value="" rows="5" > <?= $row['content']; ?> </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input name="elink" type="text" class="form-control" value="<?= $row['link']; ?>" >
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                            <input type="submit" name="EDITNEWS" class="btn btn-info" value="Submit">
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
                                            <input type="submit" name="DELETENEWS" class="btn btn-danger" value="Delete">
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