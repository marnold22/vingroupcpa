<?php include("_admin_check_loggedout.php") ?>
<?php require_once 'db_connect.php'; ?>


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
                                <h2>View <b>Users</b></h2>
                            </div>
                            <div class="col-sm-6">
                                <!-- <a href="#addNewsModal" class="btn btn-success tbl-btn" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i><span> Add News Post</span></a> -->
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
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>TOOLS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- START LOOP -->
                            <?php
                            // Attempt select query execution
                            $sql = "SELECT * FROM users";
                            if ($result = mysqli_query($connect, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        echo "<td class='overflow'>" . $row['id'] . "</td>";
                                        echo "<td class='overflow'>" . $row['username'] . "</td>";
                                        echo "<td class='overflow'>NA</td>";
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
            <!-- End of Table -->
        </div>
    </div>

    <!-- Scripts -->
    <?php include("modules/scripts.php") ?>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>