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
            <li class="nav-item active">
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
  <header class="herobanner herobanner-about">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
          <h1>About Us</h1>
          <p class="lead">Learn about who we are as a company, and get to know our team</p>
          <button id="about-lm" class="btn btn-outline-light herobanner-btn" type="button" name="button">Learn More</button>
        </div>
      </div>
    </div>
  </header>

<!-- Start About Section -->
  <div id="about-page" class="container about">
    <div id="about-desktop" class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Our Story. <span class="text-muted"></span></h2>
          <p class="lead">Wayne E. Vinson, CPA, PS is a CPA with almost 30 years of experience in tax and accounting. He has served on numerous ministry boards, as an elder in his church, is an ordained minister and owns his own CPA firm in Spokane,
            Washington. Currently serves over 700 tax clients of which more than 100 are pastors or ministers! His firm provides consulting and accounting services to a number of churches and ministries including annual church audits. He has worked
            in Children’s Ministries for more than 35 years and has a way of making complex issues more meaningful and simplified. He speaks in a language that can be clearly understood. He and his wife Annie of 40 years, have 3 married children and 14
            grandchildren.</p>
        </div>
        <div class="col-md-5">
          <div class="about-padding">
            <div class="card shadow">
              <img class="img-fluid" src="assets/about.jpg" alt="Family image of Wayne Vinson and his Wife Annie Vinson infront of autumn trees.">
            </div>
          </div>
        </div>
    </div>
    <div id="about-tablet" class="row featurette">
        <div class="col-md-12">
          <h2 class="featurette-heading">Our Story. <span class="text-muted"></span></h2>
          <div class="about-padding">
            <div class="card shadow">
              <img class="img-fluid" src="assets/about.jpg" alt="Family image of Wayne Vinson and his Wife Annie Vinson infront of autumn trees.">
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="about-padding">
            <p class="lead">Wayne E. Vinson, CPA, PS is a CPA with almost 30 years of experience in tax and accounting. He has served on numerous ministry boards, as an elder in his church, is an ordained minister and owns his own CPA firm in Spokane,
              Washington. Currently serves over 700 tax clients of which more than 100 are pastors or ministers! His firm provides consulting and accounting services to a number of churches and ministries including annual church audits. He has worked
              in Children’s Ministries for more than 35 years and has a way of making complex issues more meaningful and simplified. He speaks in a language that can be clearly understood. He and his wife Annie of 40 years, have 3 married children and 14
              grandchildren.</p>
          </div>
        </div>
    </div>
    <div id="about-mobile" class="row featurette">
        <div class="col-md-5">
          <h2 class="featurette-heading">Our Story. <span class="text-muted"></span></h2>
          <div class="card shadow">
            <img class="img-fluid" src="assets/about.jpg" alt="Family image of Wayne Vinson and his Wife Annie Vinson infront of autumn trees.">
          </div>
        </div>
        <div class="col-md-7">
          <div class="about-padding">
            <p class="lead">Wayne E. Vinson, CPA, PS is a CPA with almost 30 years of experience in tax and accounting. He has served on numerous ministry boards, as an elder in his church, is an ordained minister and owns his own CPA firm in Spokane,
              Washington. Currently serves over 700 tax clients of which more than 100 are pastors or ministers! His firm provides consulting and accounting services to a number of churches and ministries including annual church audits. He has worked
              in Children’s Ministries for more than 35 years and has a way of making complex issues more meaningful and simplified. He speaks in a language that can be clearly understood. He and his wife Annie of 40 years, have 3 married children and 14
              grandchildren.</p>
          </div>
        </div>
    </div>

    <hr class="featurette-divider">

    <!-- Team Carousel -->
    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Our Team. <span class="text-muted"></span></h2>
        <p class="lead">Here at Vin Group we work with an amazing staff that help us move towards our goals!</p>
      </div>
      <div class="col-md-5">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <div class="container">
                <div class="card border-0 shadow">
                  <img src="assets/people/temp-500x350.png" class="card-img-top" alt="Wayne E. Vinson - CPA & PS">
                  <div class="card-body text-center">
                    <h5 class="card-title mb-0">Wayne E. Vinson</h5>
                    <div class="card-text text-black-50">CPA & PS</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="container">
                <div class="card border-0 shadow">
                  <img src="assets/people/temp-500x350.png" class="card-img-top" alt="Krista Bennett - Office Manager & Accounting">
                  <div class="card-body text-center">
                    <h5 class="card-title mb-0">Krista</h5>
                    <div class="card-text text-black-50">Office Manager</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="container">
                <div class="card border-0 shadow">
                  <img src="assets/people/temp-500x350.png" class="card-img-top" alt="Carrie Liptac - Office Admin">
                  <div class="card-body text-center">
                    <h5 class="card-title mb-0">Carrie</h5>
                    <div class="card-text text-black-50">Office Admin</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="container">
                <div class="card border-0 shadow">
                  <img src="assets/people/temp-500x350.png" class="card-img-top" alt="Donna - Accounting">
                  <div class="card-body text-center">
                    <h5 class="card-title mb-0">Donna</h5>
                    <div class="card-text text-black-50">Accounting</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="container">
                <div class="card border-0 shadow">
                  <img src="assets/people/temp-500x350.png" class="card-img-top" alt="Natalya - Accounting">
                  <div class="card-body text-center">
                    <h5 class="card-title mb-0">Natalya</h5>
                    <div class="card-text text-black-50">Accounting</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="container">
                <div class="card border-0 shadow">
                  <img src="assets/people/temp-500x350.png" class="card-img-top" alt="Noah - Accounting">
                  <div class="card-body text-center">
                    <h5 class="card-title mb-0">Noah</h5>
                    <div class="card-text text-black-50">Accounting</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="container">
                <div class="card border-0 shadow">
                  <img src="assets/people/temp-500x350.png" class="card-img-top" alt="Victoria - Accounting">
                  <div class="card-body text-center">
                    <h5 class="card-title mb-0">Victoria</h5>
                    <div class="card-text text-black-50">Accounting</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="container">
                <div class="card border-0 shadow">
                  <img src="assets/people/temp-500x350.png" class="card-img-top" alt="Rebecca - CPA">
                  <div class="card-body text-center">
                    <h5 class="card-title mb-0">Rebecca</h5>
                    <div class="card-text text-black-50">CPA</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    <hr class="featurette-divider">
  </div>


  <!-- Footer -->
  <?php include("modules/footer.php") ?>

  <!-- Scripts -->
  <?php include("modules/scripts.php") ?>
</body>

</html>
