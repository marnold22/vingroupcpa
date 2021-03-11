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
                    <li class="nav-item active">
                        <a class="nav-link" href="forms.php">Forms</a>
                    </li>
                    <li class="nav-item ">
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
    <header class="herobanner herobanner-forms">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1>Forms</h1>
                    <p class="lead">Find the forms for download below</p>
                    <button id="forms-lm" class="btn btn-outline-light herobanner-btn" type="button" name="button">Forms</button>
                </div>
            </div>
        </div>
    </header>

    <div id="forms-page" class="container">
        <div class="forms">
            <div class="col-md-12">
                <h2 class="featurette-heading text-center">Forms<span class="text-muted"></span></h2>
                <br>
            </div>

            <div class="row forms-padding">
                <div class="col-sm-4">
                    <a class="pdf-style" href="assets/pdf/#" target="_blank">
                        <div class="card mx-auto pdf" style="width: 18rem;">
                            <img class="card-img-top" src="assets/gen-form.jpg" alt="FORM NAME HERE">
                            <div class="card-body text-center">
                                <h6>W-4 Form</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a class="pdf-style" href="assets/pdf/#" target="_blank">
                        <div class="card mx-auto pdf" style="width: 18rem;">
                            <img class="card-img-top" src="assets/gen-form.jpg" alt="FORM NAME HERE">
                            <div class="card-body text-center">
                                <h6>I-9 Form</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a class="pdf-style" href="assets/pdf/#" target="_blank">
                        <div class="card mx-auto pdf" style="width: 18rem;">
                            <img class="card-img-top" src="assets/gen-form.jpg" alt="FORM NAME HERE">
                            <div class="card-body text-center">
                                <h6>W-2 Form</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="row forms-padding">
                <div class="col-sm-4">
                    <a class="pdf-style" href="assets/pdf/auto_bank_withdraw_consent.pdf" target="_blank">
                        <div class="card mx-auto pdf" style="width: 18rem;">
                            <img class="card-img-top" src="assets/bank.jpg" alt="Automatic Bank Withdrawl Form">
                            <div class="card-body text-center">
                                <h6>Automatic Bank Withdrawl</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a class="pdf-style" href="assets/pdf/visa_mc_charge_consent.pdf" target="_blank">
                        <div class="card mx-auto pdf" style="width: 18rem;">
                            <img class="card-img-top" src="assets/cc.jpg" alt="Credit Card Authorization Form">
                            <div class="card-body text-center">
                                <h6>Credit Card Authorization</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include("modules/footer.php") ?>

    <!-- Scripts -->
    <?php include("modules/scripts.php") ?>
</body>

</html>