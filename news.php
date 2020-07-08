<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include("modules/head.php") ?>

<body>

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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="events.php">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="news.php">News</a>
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
    <header class="herobanner herobanner-news">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1>News Feed</h1>
                    <button id="news-lm" class="btn btn-outline-light herobanner-btn" type="button" name="button">Learn More</button>
                </div>
            </div>
        </div>
    </header>


    <div id="news-page" class="container">
        <div class="col-md-12">
            <h2 class="featurette-heading">News Postings<span class="text-muted"></span></h2>
        </div>




        <!-- LOOP START HERE -->
        <!-- Loop through all news articles in database and instert into this HTML template -->
        <!-- NOTE - Make sure to chance collapseEvent-X to whatever iteration the loop is on -->

        <div class="row featurette">
            <div class="col-md-4">
                <div class="event-padding">
                    <div class="card shadow">
                        <img class="img-fluid" src="assets/news/news-default.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h2 class="featurette-heading">TITLE HERE<span class="text-muted"></span></h2>
                <div class="row">
                    <div class="col event-btn">
                        <a class="btn-services" data-toggle="collapse" href="#collapseEvent-1" role="button" aria-expanded="false" aria-controls="collapseEvent-1">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Start of the Dropdown -->
            <div class="col-md-12">
                <div class="collapse btn-div-gap" id="collapseEvent-1">
                    <div class="card card-body">
                        <p>CONTENT HERE</p>
                    </div>
                </div>
            </div>
            <hr class="featurette-divider">
        </div>

        <div class="row featurette">
            <div class="col-md-4">
                <div class="event-padding">
                    <div class="card shadow">
                        <img class="img-fluid" src="assets/news/news-default.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h2 class="featurette-heading">TITLE HERE<span class="text-muted"></span></h2>
                <div class="row">
                    <div class="col event-btn">
                        <a class="btn-services" data-toggle="collapse" href="#collapseEvent-1" role="button" aria-expanded="false" aria-controls="collapseEvent-1">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Start of the Dropdown -->
            <div class="col-md-12">
                <div class="collapse btn-div-gap" id="collapseEvent-1">
                    <div class="card card-body">
                        <p>CONTENT HERE</p>
                    </div>
                </div>
            </div>
            <hr class="featurette-divider">
        </div>
        <div class="row featurette">
            <div class="col-md-4">
                <div class="event-padding">
                    <div class="card shadow">
                        <img class="img-fluid" src="assets/news/news-default.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h2 class="featurette-heading">TITLE HERE<span class="text-muted"></span></h2>
                <div class="row">
                    <div class="col event-btn">
                        <a class="btn-services" data-toggle="collapse" href="#collapseEvent-1" role="button" aria-expanded="false" aria-controls="collapseEvent-1">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Start of the Dropdown -->
            <div class="col-md-12">
                <div class="collapse btn-div-gap" id="collapseEvent-1">
                    <div class="card card-body">
                        <p>CONTENT HERE</p>
                    </div>
                </div>
            </div>
            <hr class="featurette-divider">
        </div>


        <!-- LOOP END HERE -->





    </div>

    <!-- Footer -->
    <?php include("modules/footer.php") ?>

    <!-- Scripts -->
    <?php include("modules/scripts.php") ?>
</body>

</html>