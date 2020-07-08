<?php
    // Include config file
    require_once 'db_connect.php';

    // Define variables and initialize with empty values
    $title = $content = $img = "";
    $title_err = $content_err = $img_err = "";
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
                                <a href="#addNewsModal" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i><span>   Add News Post</span></a>
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
                            <!-- Loop through this for all DB records in news table -->
                            <?php
                                // Select all fields from news table
                                $query = "SELECT * FROM news;";

                                // Store data in table_display
                                $table_display = mysqli_query($query, $connect);

                                foreach($table_display as $row) { ?>

                                <tr>
                                    <td class="overflow"> <?= $row['id']; ?> </td>
                                    <td class="overflow"> <?= $row['title']; ?> </td>
                                    <td class="overflow"> <?= $row['content']; ?> </td>
                                    <td class="overflow"> <?= $row['image']; ?> </td>
                                    <td class="overflow"><a href="#editNewsModal" class="edit" data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i></a><a href="#deleteNewsModal" class="delete" data-toggle="modal"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                </tr>

                              <?php } ?>

                            <!-- END LOOP -->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- ******************** ALL MODALS ******************** -->

    <!-- Add Modal HTML -->
    <div id="addNewsModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Create News Post</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Media</label>
                            <input type="file" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" placeholder="Content Body Here..." rows="5" required></textarea>
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


    <!-- Edit Modal HTML -->
    <div id="editNewsModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Edit News Post</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Media</label>
                            <input type="file" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" placeholder="Content Body Here..." rows="5" required></textarea>
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


    <!-- Delete Modal HTML -->
    <div id="deleteNewsModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete News Post</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
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