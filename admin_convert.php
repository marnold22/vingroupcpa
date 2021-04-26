<?php include("_admin_check_loggedout.php") ?>

<?php
// Include config file
require_once 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<?php include("modules/admin_head.php") ?>
<style>

#form, #save-container, select {
    margin: 1em 0;
}
.hidden {
    display: none;
}

#canvas {
    width: 100%;
    height: 100%;
}

.flexible-size {
    position: relative;
    height: 0;
}
.flexible-size canvas {
    position: absolute;
    top: 0;
    left: 0;
    width: 10%;
    height: 10%;
}
</style>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="admin.php">Vingroupcpa Admin</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa fa-window-maximize"></i></button>
    </nav>

    <!-- Sidebar Navigation -->
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

                        <a class="nav-link" href="admin_convert.php" aria-expanded="false">HEIC Convert</a>
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
            
            <!-- HEIC & HEIF File Converter Content -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card card-signin">
                            <div class="card-body">
                                <h5 class="card-title text-center">HEIC CONVERT</h5>
                                <div id="form" class="hidden">
                                    <div>
                                        Select HEIF image file to display:
                                    </div>
                                    <input type="file" id="file">
                                </div>
                                <select id="images" class="hidden"></select>
                                <div id="loading">
                                    Loading, please wait...
                                </div>
                                <div id="decoding" class="hidden">
                                    Decoding, please wait...
                                </div>
                                <div id="save-container" class="hidden">
                                    <button id="save">Save image...</button>
                                    <div id="downloads" class="hidden">
                                    </div>
                                </div>
                                <div id="container" class="hidden">
                                    <canvas id="canvas"></canvas>
                                </div>
                                <div id="error-format" class="hidden">
                                    The selected file is not a valid HEIF file or the specific format is not
                                    supported yet.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <?php include("modules/scripts.php") ?>
</body>

</html>