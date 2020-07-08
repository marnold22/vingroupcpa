<?php

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
        <!-- Hero Banner -->
        <header class="herobanner herobanner-admin-news">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 text-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-light herobanner-cbtn" data-toggle="modal" data-target="#adminNewsModal">Create News Posting</button>
                    </div>
                </div>
                <!-- Article Creation Modal -->
                <?php include("modules/admin-news-modal.php") ?>
            </div>
        </header>

        <!-- Footer -->
        <footer class="py-3">
            <div class="container">
                <div class="row"></div>
            </div>
        </footer>

        <!-- Scripts -->
        <?php include("modules/scripts.php") ?>
    </body>
</html>