<?php 
    // Include config file
    require_once 'db_connect.php';
?>

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
                        <a class="nav-link active" href="news.php">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="forms.php">Forms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="payment.php">Payment</a>
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
        <div class="row news-header">
            <h2 class="featurette-heading">News Postings<span class="text-muted"></span></h2>
        </div>

        <!-- START LOOP -->
        <?php
        // Select all news articles and output each article with its own section
        $sql = "SELECT * FROM news";
        if ($result = mysqli_query($connect, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) { 
                $counter = 0; ?>

                <!-- NOTE - Make sure to change collapseEvent-X to whatever iteration the loop is on -->
                <div class="row featurette">
                    <div class="col-md-4">
                        <div class="event-padding">
                            <div class="card shadow">
                                <img class="img-fluid" src="<?=$row['picture']; ?>" alt="<?= $row['title']; ?>" onerror="this.onerror=null;this.src='/assets/news/news-default.jpg';">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="vertical-center">
                            <h2 class="featurette-heading"><?= $row['title']; ?><span class="text-muted"></span></h2>
                            <div class="row">
                                <div class="col event-btn">
                                    <a class="btn-services" data-toggle="collapse" href="#collapseEvent-<?=$row['id']; ?>" role="button" aria-expanded="false" aria-controls="collapseEvent-<?=$row['id']; ?>>">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Start of the Dropdown -->
                    <!-- REGEX Simple clean up of certain text characters -->
                    <div class="col-md-12">
                        <div class="collapse btn-div-gap" id="collapseEvent-<?=$row['id']; ?>">
                            <div class="card card-body">
                                <p>
                                    <?php
                                        // Searches text for "\n" and replaces with a <br>
                                        $text = nl2br($row['content']);
                                        $box = '';
                                        $bullet = '&bull;';

                                        // Search text for '' and add bullets in place
                                        $dropdown = str_replace($box, $bullet, $text);
                                        echo($dropdown);
                                        // Note - look into explode() for further unordered lists  
                                    ?>
                                </p>
                                <?php 
                                    if(!empty($row['link'])) { ?>
                                    <div class="container text-center">
                                        <a class="btn-services" href="<?= $row['link'] ?>" target="_blank">Link</a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <hr class="featurette-divider">
                </div>

                
                <!-- END NEWS LOOP -->
                <?php $counter = $counter+1;}


                // Free result set
                mysqli_free_result($result);
            } else {
                echo "
                <br>
                <div class='col-md-12'>
                    <h2 class='featurette-heading'>No news postings were found.<span class='text-muted'></span></h2>
                </div>
                <br>
                ";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        ?>
        <!-- END LOOP -->

    </div>
    <!-- Footer -->
    <?php include("modules/footer.php") ?>

    <!-- Scripts -->
    <?php include("modules/scripts.php") ?>
</body>

</html>