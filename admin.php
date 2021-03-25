<?php include("_admin_check_loggedout.php") ?>

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
            <!-- PAGE UNIQUE CONTET GOES HERE -->
            <div class="container">
                <div class="welcome-card">
                    <div class="text-center">
                        <h2>Welcome to the admin dashboard!</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <?php include("modules/scripts.php") ?>
</body>

</html>