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
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="services.php">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="events.php">Events</a>
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
  <header class="herobanner herobanner-home">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
          <h1>The Vin Group</h1>
          <p class="lead">Tax and finance advisory for the individual, small businesses, and non-profits</p>
          <button id="home-lm" class="btn btn-outline-light herobanner-btn" type="button" name="button">Learn More</button>
        </div>
      </div>
    </div>
  </header>

  <div id="home-page" class="container home"></div>

  <div class="container home">
    <!-- DESKTOP VERSION -->
    <div id="index-desktop" class="row featurette">
      <div class="col-md-12">
        <h2 class="featurette-heading text-center">Services<span class="text-muted"></span></h2>
        <br>
      </div>
      <div class="col-md-12">
        <div class="container-fluid">
          <div id="desktop" class="carousel slide" data-ride="carousel">
            <!-- The slideshow -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-md-4 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Accounting</h4>
                        <p class="card-text">Our firm provides classic accounting services for individuals, businesses, non-profit organizations, and churches. As CPAs, Vin Group has the expertise and credentials to address your compliance and
                          reporting issues.</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#accounting" class="btn-services-inverse">See accounting &raquo;</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Payroll</h4>
                        <p class="card-text">Our firm offers complete and comprehensive payroll services for businesses of all sizes. Our payroll staff is here to help with any payroll needs, from basic to the most complex. Our firm offers a variety
                          of payroll options to fit your personal payroll needs.</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#payroll" class="btn-services-inverse">See payroll &raquo;</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Tax Prep</h4>
                        <p class="card-text">Tax work is a large part of Vin Group. They understand the tax laws and assist a variety of clients with an emphasis in ministerial and non-profit. Render unto Caesar what is Caesar's... and not a penny
                          more</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#tax-prep" class="btn-services-inverse">See tax prep &raquo;</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-md-4 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Consulting</h4>
                        <p class="card-text">Vin Group provides an array of valuable consulting services to individuals, small businesses as well as non-profit organizations and churches. The firm also has extensive experience on a number of critical
                          issues.</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#consulting" class="btn-services-inverse">See consulting &raquo;</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Church & Non-Profit</h4>
                        <p class="card-text">Containing CPAs and a licensed minister, Vin Group brings a unique perspective to their work with churches and other non-profit organizations. The group has a strong commitment to excellence and integrity
                          in financial matters, and works effectively with churches, boards, volunteer staff, and ministers to implement sound financial systems and reporting mechanisms.</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#church-np" class="btn-services-inverse">See church & non-profit &raquo;</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Investment & Retirement</h4>
                        <p class="card-text">Vin Group can assist you with your investment and retirement planning. We can provide you with information about a diverse set of investment options including life insurance. We excel at providing a
                          comprehensive approach to financial planning because we can see our clients’ entire financial picture as we advise them about future planning.</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#invest-retire" class="btn-services-inverse">See investment & retirement &raquo;</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-md-4 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Seminars</h4>
                        <p class="card-text">Wayne has developed a highly successful seminar entitled "Getting the House in Order." The seminar equips treasurers and ministers in efficient money saving stewardship, with specific training in
                          QuickBooks®. Wayne is available to do a seminar in your area should you want to pull one together for yours and other churches.</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#seminars" class="btn-services-inverse">See seminars &raquo;</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Pricing</h4>
                        <p class="card-text">For any of our services please check out our pricings here, or for custom service based pricing please call our office.</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#pricing" class="btn-services-inverse">See pricing &raquo;</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Payment Options</h4>
                        <p class="card-text">The Vin Group provides various payment options for your convenience. These options range from online payments, automatic bank withdrawl, and credit card options.</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#payment-options" class="btn-services-inverse">See payment options &raquo;</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12"><br></div>
      <div class="col-md-12">
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <button class="btn-services-inverse" href="#desktop" data-slide="prev"><span class="arrow">&#x2190;</span></button>
              <button class="btn-services-inverse" href="#desktop" data-slide="next"><span class="arrow">&#x2192;</span></button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- TABLET VERSION -->
    <div id="index-tablet" class="row featurette">
      <div class="col-md-12">
        <h2 class="featurette-heading text-center">Services<span class="text-muted"></span></h2>
        <br>
      </div>
      <div class="col-md-12">
        <div class="container-fluid">
          <div id="tablet" class="carousel slide" data-ride="carousel">
            <!-- The slideshow -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-md-6 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Accounting</h4>
                        <p class="card-text">Our firm provides classic accounting services for individuals, businesses, non-profit organizations, and churches. As CPAs, Vin Group has the expertise and credentials to address your compliance and
                          reporting issues.</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#accounting" class="btn-services-inverse">See accounting &raquo;</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Payroll</h4>
                        <p class="card-text">Our firm offers complete and comprehensive payroll services for businesses of all sizes. Our payroll staff is here to help with any payroll needs, from basic to the most complex. Our firm offers a variety
                          of payroll options to fit your personal payroll needs.</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#payroll" class="btn-services-inverse">See payroll &raquo;</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-md-6 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Tax Prep</h4>
                        <p class="card-text">Tax work is a large part of Vin Group. They understand the tax laws and assist a variety of clients with an emphasis in ministerial and non-profit. Render unto Caesar what is Caesar's... and not a penny
                          more</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#tax-prep" class="btn-services-inverse">See tax prep &raquo;</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Consulting</h4>
                        <p class="card-text">Vin Group provides an array of valuable consulting services to individuals, small businesses as well as non-profit organizations and churches. The firm also has extensive experience on a number of critical
                          issues.</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#consulting" class="btn-services-inverse">See consulting &raquo;</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-md-6 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Church & Non-Profit</h4>
                        <p class="card-text">Containing CPAs and a licensed minister, Vin Group brings a unique perspective to their work with churches and other non-profit organizations. The group has a strong commitment to excellence and integrity
                          in financial matters, and works effectively with churches, boards, volunteer staff, and ministers to implement sound financial systems and reporting mechanisms.</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#church-np" class="btn-services-inverse">See church & non-profit &raquo;</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Investment & Retirement</h4>
                        <p class="card-text">Vin Group can assist you with your investment and retirement planning. We can provide you with information about a diverse set of investment options including life insurance. We excel at providing a
                          comprehensive approach to financial planning because we can see our clients’ entire financial picture as we advise them about future planning.</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#invest-retire" class="btn-services-inverse">See investment & retirement &raquo;</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-md-6 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Seminars</h4>
                        <p class="card-text">Wayne has developed a highly successful seminar entitled "Getting the House in Order." The seminar equips treasurers and ministers in efficient money saving stewardship, with specific training in
                          QuickBooks®. Wayne is available to do a seminar in your area should you want to pull one together for yours and other churches.</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#seminars" class="btn-services-inverse">See seminars &raquo;</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Pricing</h4>
                        <p class="card-text">For any of our services please check out our pricings here, or for custom service based pricing please call our office.</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#pricing" class="btn-services-inverse">See pricing &raquo;</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-md-12 mb-2">
                    <div class="card h-100 service-card">
                      <div class="card-body">
                        <h4 class="card-title">Payment Options</h4>
                        <p class="card-text">The Vin Group provides various payment options for your convenience. These options range from online payments, automatic bank withdrawl, and credit card options.</p>
                      </div>
                      <div class="card-footer py-4 text-center">
                        <a href="services.php#payment-options" class="btn-services-inverse">See payment options &raquo;</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12"><br></div>
      <div class="col-md-12">
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <button class="btn-services-inverse" href="#tablet" data-slide="prev"><span class="arrow">&#x2190;</span></button>
              <button class="btn-services-inverse" href="#tablet" data-slide="next"><span class="arrow">&#x2192;</span></button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- MOBILE VERSION -->
    <div id="index-mobile" class="row featurette">
      <div class="col-md-12">
        <h2 class="featurette-heading text-center">Services<span class="text-muted"></span></h2>
        <br>
      </div>
      <div class="col-md-12">
        <div class="col-md-6 mb-2">
          <div class="card h-100 service-card">
            <div class="card-body">
              <h4 class="card-title">Accounting</h4>
              <p class="card-text">Our firm provides classic accounting services for individuals, businesses, non-profit organizations, and churches. As CPAs, Vin Group has the expertise and credentials to address your compliance and reporting
                issues.</p>
            </div>
            <div class="card-footer py-4 text-center">
              <a href="services.php#accounting" class="btn-services-inverse">See accounting &raquo;</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="card h-100 service-card">
            <div class="card-body">
              <h4 class="card-title">Payroll</h4>
              <p class="card-text">Our firm offers complete and comprehensive payroll services for businesses of all sizes. Our payroll staff is here to help with any payroll needs, from basic to the most complex. Our firm offers a variety of payroll
                options to fit your personal payroll needs.</p>
            </div>
            <div class="card-footer py-4 text-center">
              <a href="services.php#payroll" class="btn-services-inverse">See payroll &raquo;</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="card h-100 service-card">
            <div class="card-body">
              <h4 class="card-title">Tax Prep</h4>
              <p class="card-text">Tax work is a large part of Vin Group. They understand the tax laws and assist a variety of clients with an emphasis in ministerial and non-profit. Render unto Caesar what is Caesar's... and not a penny more</p>
            </div>
            <div class="card-footer py-4 text-center">
              <a href="services.php#tax-prep" class="btn-services-inverse">See tax prep &raquo;</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="card h-100 service-card">
            <div class="card-body">
              <h4 class="card-title">Consulting</h4>
              <p class="card-text">Vin Group provides an array of valuable consulting services to individuals, small businesses as well as non-profit organizations and churches. The firm also has extensive experience on a number of critical issues.
              </p>
            </div>
            <div class="card-footer py-4 text-center">
              <a href="services.php#consulting" class="btn-services-inverse">See consulting &raquo;</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="card h-100 service-card">
            <div class="card-body">
              <h4 class="card-title">Church & Non-Profit</h4>
              <p class="card-text">Containing CPAs and a licensed minister, Vin Group brings a unique perspective to their work with churches and other non-profit organizations. The group has a strong commitment to excellence and integrity in
                financial matters, and works effectively with churches, boards, volunteer staff, and ministers to implement sound financial systems and reporting mechanisms.</p>
            </div>
            <div class="card-footer py-4 text-center">
              <a href="services.php#church-np" class="btn-services-inverse">See church & non-profit &raquo;</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="card h-100 service-card">
            <div class="card-body">
              <h4 class="card-title">Investment & Retirement</h4>
              <p class="card-text">Vin Group can assist you with your investment and retirement planning. We can provide you with information about a diverse set of investment options including life insurance. We excel at providing a comprehensive
                approach to financial planning because we can see our clients’ entire financial picture as we advise them about future planning.</p>
            </div>
            <div class="card-footer py-4 text-center">
              <a href="services.php#invest-retire" class="btn-services-inverse">See investment & retirement &raquo;</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="card h-100 service-card">
            <div class="card-body">
              <h4 class="card-title">Seminars</h4>
              <p class="card-text">Wayne has developed a highly successful seminar entitled "Getting the House in Order." The seminar equips treasurers and ministers in efficient money saving stewardship, with specific training in QuickBooks®. Wayne
                is available to do a seminar in your area should you want to pull one together for yours and other churches.</p>
            </div>
            <div class="card-footer py-4 text-center">
              <a href="services.php#seminars" class="btn-services-inverse">See seminars &raquo;</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="card h-100 service-card">
            <div class="card-body">
              <h4 class="card-title">Pricing</h4>
              <p class="card-text">For any of our services please check out our pricings here, or for custom service based pricing please call our office.</p>
            </div>
            <div class="card-footer py-4 text-center">
              <a href="services.php#pricing" class="btn-services-inverse">See pricing &raquo;</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="card h-100 service-card">
            <div class="card-body">
              <h4 class="card-title">Payment Options</h4>
              <p class="card-text">The Vin Group provides various payment options for your convenience. These options range from online payments, automatic bank withdrawl, and credit card options.</p>
            </div>
            <div class="card-footer py-4 text-center">
              <a href="services.php#payment-options" class="btn-services-inverse">See payment options &raquo;</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <hr class="featurette-divider">
  </div>

  <div class="fluid-container">
    <div class="design">
      <div class="content">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 quote-padding text-center">
            <h2 class="featurette-quote white">“…well informed and presented expertise in terms and language the untrained lay person could grasp.”</h2>
            <h2 class="featurette-quoter white">– J.T, Spokane WA</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fluid-container">
    <div class="blank">
      <div class="content">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 quote-padding-2 text-center">
            <h2 class="featurette-quote">“I was at your seminar and I can’t thank you enough! I have an accounting background and was identified as a likely target to clean up our books, but I had no knowledge of non-profit. I have been re-invigorated in my duties…I was feeling anxious because of my lack of basic knowledge. Your seminar really helped me.”</h2>
            <h2 class="featurette-quoter">- Dan P, Lakewood, CO</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fluid-container">
    <div class="contact">
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <h2 class="featurette-heading text-center white">Contact Us<span class="text-muted"></span></h2>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="text-center">
              <i class="fa fa-map-marker fa-3x ipad" aria-hidden="true"></i>
              <p class="lead mobile"><strong>We are located at:</strong></p>
              <p class="lead mobile">2132 W. NW Blvd</p>
              <p class="lead mobile">Spokane WA, 99205</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="text-center">
              <i class="fa fa-address-book fa-3x ipad" aria-hidden="true"></i>
              <p class="lead mobile"><strong>You can reach us at:</strong></p>
              <p class="lead mobile"><b>Tel:</b> (509) 443-4262</p>
              <p class="lead mobile"><b>Fax:</b> (509) 443-4692</p>
              <p class="lead mobile"><b>Email:</b> cpa@vingroup.com</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="text-center">
              <i class="fa fa-clock-o fa-3x ipad" aria-hidden="true"></i>
              <p class="lead mobile"><strong>Regular Hours:</strong></p>
              <p class="lead mobile">Mon - Thur: 8am - 4pm</p>
              <p class="lead mobile">Fri - Sun: Closed</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="text-center">
              <i class="fa fa-clock-o fa-3x ipad" aria-hidden="true"></i>
              <p class="lead mobile"><strong>Tax Season Hours:</strong></p>
              <p class="lead mobile">(January - April)</p>
              <p class="lead mobile">Mon - Fri: 8am - 5pm</p>
              <p class="lead mobile">Sat - Sun: Closed</p>
            </div>
          </div>
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
