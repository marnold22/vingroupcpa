<?php
// Include config file
require_once 'db_connect.php';
?>




<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include("modules/head.php") ?>

<!-- Navigation -->
<nav id="main-navbar" class="navbar navbar-expand-lg navbar-dark shadow fixed-top bg-cpagreen">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="assets/logo.jpg" width="30" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="admin_news.php">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_users.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_reset_password.php">Password Reset</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body>
    <!-- News Table -->
    <div id="adminnews-page" class="admin-news">
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Manage <b>News Posts</b></h2>
                            </div>
                            <div class="col-sm-6">
                                <a href="#addNewsModal" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i><span> Add News Post</span></a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Post ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Img</th>
                                <th>TOOLS</th>
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
                                        echo "<td class='overflow'>" . $row['image'] . "</td>";
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
    </div>
    <!-- End of Table -->


    <!-- ******************** START ALL MODALS ******************** -->


    <!-- ADD MODAL -->
    <div id="addNewsModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="_news_add.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Create News Post</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input name="ctitle" type="text" class="form-control" required>
                            <span class="help-block"><?php echo $title_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input name="cimage" type="file" class="form-control-file">
                            <span class="help-block"><?php echo $image_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="ccontent" class="form-control" placeholder="Content Body Here..." rows="5" required></textarea>
                            <span class="help-block"><?php echo $content_err; ?></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
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

                <div id="editNewsModal-<?= $row['id']; ?>" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="_news_update.php?id=<?= $row['id']; ?>" method="POST">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit News Post</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input name="stitle" type="text" class="form-control" placeholder="<?= $row['title']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input name="simage" type="file" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea name="scontent" class="form-control" placeholder="<?= $row['content']; ?>" rows="5" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <input type="submit" class="btn btn-info" value="Save">
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
                <div id="deleteNewsModal-<?= $row['id']; ?>" class="modal fade">
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
                                    <input type="submit" class="btn btn-danger" value="Delete">
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

    
    <!-- Footer -->
    <footer class="py-3">
        <div class="container">
            <div class="row"></div>
        </div>
    </footer>

    <!-- Scripts -->
    <?php include("modules/scripts.php") ?>
    <!-- Prevent resubmissoin of form on page refresh -->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>