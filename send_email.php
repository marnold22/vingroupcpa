<?php

  //Initialize Email Variables
  $email_to = "michaelarnold615@gmail.com";
  $email_subject = "Request More Information From Website";

  //Initializing Error Variables To Null.
  $fnameError ="";
  $lnameError ="";
  $emailError ="";
  $businessError ="";
  $messageError ="";

  //This checks to see if form was 'Submitted'
  if(isset($_POST['submit'])) {

    //First Name Sanitize
    if($_POST['fname'] != "") {
      $fnameSanitized = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);

      $fnameError = "";
      if($_POST['fname'] == ""){
        $fnameError = "Please enter a valid name.";
      }else {
        $fnameError = "Please enter your name.";
      }
    }

    //Last Name Sanitize
    if($_POST['lname'] != "") {
      $lnameSanitized = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);

      $lnameError = "";
      if($_POST['lname'] == ""){
        $lnameError = "Please enter a valid last name.";
      }else {
        $lnameError = "Please enter your last name.";
      }
    }

    //Email Sanitize
    if($_POST['email'] != "") {
      $emailSanitized = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      $emailVerified = filter_var($emailSanitized, FILTER_VALIDATE_EMAIL);

      $emailError = "";
      if($_POST['email'] == ""){
        $emailError = "Please enter a email.";
      }else {
        $emailError = "Please enter email.";
      }
    }

    //Business Name Sanitized
    if($_POST['bname'] != "") {
      $bnameSanitized = filter_var($_POST['bname'], FILTER_SANITIZE_STRING);

      $businessError = "";
      if($_POST['bname'] == ""){
        $businessError = "Please enter a valid business name.";
      }else {
        $businessError = "Please enter your business name.";
      }
    }

    //Message Sanitized
    if($_POST['message'] != "") {
      $messageSanitized = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

      $messageError = "";
      if($_POST['message'] == ""){
        $messageError = "Please enter a valid name.";
      }else {
        $messageError = "Please enter your name.";
      }
    }

    // Loop through all checkboxes
    if(!empty($_POST['check_list'])) {
      foreach($_POST['check_list'] as $selected)
        $checkboxSelection .= ', '.$selected;
    }

    //Create Email Message
    $email_message .= "First Name: ".$fnameSanitized."\n";
    $email_message .= "Last Name: ".$lnameSanitized."\n";
    $email_message .= "Email: ".$emailVerified."\n";
    $email_message .= "Interests: ".$checkboxSelection."\n";
    $email_message .= "Business: ".$bnameSanitized."\n";
    $email_message .= "Message: ".$messageSanitized."\n";

    //Create email headers
    $headers = 'From: '.$emailVerified."\r\n".'Reply-To: '.$emailVerified."\r\n".'X-Mailer: PHP/'. phpversion();
    //Send Mail
    $mailStatus = mail($email_to, $email_subject, $email_message, $headers);

    if ($mailStatus) { ?>
      <script language="javascript" type="text/javascript">
        alert('Thank you for the message. We will contact you shortly.');
        window.location.href = 'index.html';
      </script>
      <?php
    }
    else { ?>
        <script language="javascript" type="text/javascript">
          alert('Message failed. Please, send an email to gordon@template-help.com');
          window.location.href = 'index.html';
        </script>
        <?php
    }
    ?>
<?php }
?>
