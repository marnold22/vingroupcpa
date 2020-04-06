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
            <li class="nav-item ">
                <a class="nav-link" href="events.php">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item active">
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
  <header class="herobanner herobanner-contact">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-light herobanner-cbtn" data-toggle="modal" data-target="#contactModal">Contact Us</button>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header modal-hf">
            <h5 class="modal-title" id="modalTitle">Wayne E. Vinson - Vin Group</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form name="contact-form" method="POST" action="#">
              <div class="row">
                <div class="col">
                  <div class="location">
                    We are located at: <br> 2132 W. NW Blvd Spokane WA, 99205
                  </div>
                </div>
                <div class="col">
                  <div class="info">
                    <ul>
                      <li>Tel: 509-443-4262</li>
                      <li>Fax: (509) 443-4692</li>
                      <li>cpa@vingroup.com</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="row">
                <hr>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <label for="fName">First Name*</label>
                    <input type="text" class="form-control" name="fname" id="fNameInput" placeholder="First name">
                  </div>
                  <div class="col">
                    <label for="lName">Last Name*</label>
                    <input type="text" class="form-control" name="lname" id="lNameInput" placeholder="Last name">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="emailInput">Email address*</label>
                <input type="email" class="form-control" name="email" id="emailInput" placeholder="name@example.com">
              </div>

              <div class="form-group">
                <label for="checkboxList">I am interested in help with:*</label>
                <div class="row">
                  <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="check_list[]" value="accounting" id="accounting">
                      <label class="form-check-label" for="accounting">Accounting</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="check_list[]" value="payroll" id="payroll">
                      <label class="form-check-label" for="payroll">Pay Roll</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="check_list[]" value="taxprep" id="taxprep">
                      <label class="form-check-label" for="taxprep">Tax Prep</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="check_list[]" value="consulting" id="consulting">
                      <label class="form-check-label" for="consulting">Consulting</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="check_list[]" value="nonprof-chruch" id="nonprof-chruch">
                      <label class="form-check-label" for="nonprof-church">Non-Profit / Church</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="check_list[]" value="investment" id="investment">
                      <label class="form-check-label" for="investment">Investment</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="check_list[]" value="retirement" id="retirement">
                      <label class="form-check-label" for="retirement">Retirement</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="check_list[]" value="seminars" id="seminars">
                      <label class="form-check-label" for="seminars">Seminars</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Name of Business</label>
                <input type="text" class="form-control" name="bname" id="businessInput" placeholder="Name of Business">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Additional Message</label>
                <textarea class="form-control" name="message" id="messageInput" rows="3"></textarea>
              </div>
              <div class="text-center">
                <button type="submit" name="submit" class="btn-services">Submit</button>
              </div>
            </form>
          </div>
          <div class="modal-footer modal-hf">
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Footer -->
  <?php include("modules/footer.php") ?>

  <!-- Scripts -->
  <?php include("modules/scripts.php") ?>


  <script type="text/javascript">
    $(window).on('load', function() {
      $('#contactModal').modal('show');
    });
  </script>
</body>

</html>
