<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include("modules/head.php") ?>

<body>

    <!-- Navigation -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-dark shadow fixed-top bg-cpagreen">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="assets/logo.jpg" width="30" height="30" alt="White on green Vingroupcpa Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="events.php">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="news.php">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://voffice.dillners.com/securelogin.asp?acct=23627" target="_blank">Client Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Banner -->
    <header class="herobanner herobanner-payment">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1>Payment</h1>
                    <button id="payment-lm" class="btn btn-outline-light herobanner-btn" type="button" name="button">Learn More</button>
                </div>
            </div>
        </div>
    </header>

    <div id="payment-page" class="container my-5">
        <h1 class="text-center">Paypal Payments</h1>
        <div class="paypal">
            <?php include("USE_PAYPAL_HERE.php") ?>
        </div>
    </div>



    <!-- Footer -->
    <?php include("modules/footer.php") ?>

    <!-- Scripts -->
    <?php include("modules/scripts.php") ?>
</body>

</html>