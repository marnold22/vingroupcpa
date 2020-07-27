<?php include("_admin_check_loggedout.php") ?>

<?php
// Include config file
require_once 'db_connect.php';

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate new password
    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Please enter the new password.";
    } elseif (strlen(trim($_POST["new_password"])) < 6) {
        $new_password_err = "Password must have at least 6 characters.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm the password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before updating the database
    if (empty($new_password_err) && empty($confirm_password_err)) {
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";

        if ($stmt = mysqli_prepare($connect, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: admin_login.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($connect);
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<?php include("modules/admin_head.php") ?>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="admin.php">Vingroupcpa Admin</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
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
                        <a class="nav-link" href="#" aria-expanded="false">Register</a>
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
            <!-- Password Reset Form -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card card-signin">
                            <div class="card-body">
                                <h5 class="card-title text-center">Password Reset</h5>
                                <form class="form-signin" action="" method="POST">

                                    <div class="form-label-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                                        <input name="new_password" type="text" id="newPassword" class="form-control" placeholder="New Password" required autofocus>
                                        <label for="newPassword">New Password</label>
                                        <span class="help-block"><?php echo $new_password_err; ?></span>
                                    </div>

                                    <div class="form-label-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                        <input name="confirm_password" type="text" id="confirmPassword" class="form-control" placeholder="Confirm Password" required>
                                        <label for="confirmPassword">Confirm Password</label>
                                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Confirm</button>

                                </form>
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