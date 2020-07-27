<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: admin.php");
    exit;
}
?>

<?php
// Include config file
require_once 'db_connect.php';

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($connect, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: admin.php");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
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

<body>
    <!-- Login Form -->
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form class="form-signin" action="" method="POST" >

                            <div class="form-label-group">
                                <input name="username" type="text" id="inputUsername" class="form-control" placeholder="User Name" required autofocus>
                                <label for="inputUsername">Username</label>
                            </div>

                            <div class="form-label-group">
                                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-3">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <?php include("modules/scripts.php") ?>
</body>

</html>