<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

//Load .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Define variables and set to empty
$fname = $lname = $email = $checklist = $business = $message = "";
$fname_error = $lname_error = $email_error = $checklist_error = $business_error = $message_error = $mailsend_success = $mailsend_error = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Check if fname is entered and correct (REQUIRED)
    if (empty($_POST["fname"])) {
        $fname_error = "First name is required";
    } else {
        $fname = clean_input($_POST["fname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
            $fname_error = "Only letters and white space allowed";
        }
    }

    //Check if lname is entered and correct (REQUIRED)
    if (empty($_POST["lname"])) {
        $lname_error = "Last name is required";
    } else {
        $lname = clean_input($_POST["lname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
            $lname_error = "Only letters and white space allowed";
        }
    }

    //Check if email is entered and correct (REQUIRED)
    if (empty($_POST["email"])) {
        $email_error = "Email is required";
    } else {
        $email = clean_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Invalid email format";
        }
    }

    //Check if checklists are selected (REQUIRED)
    if (empty($_POST["check_list"])) {
        $checklist_error = "Please select all that apply";
    } else {
        // Loop through all checkboxes           
        foreach ($_POST['check_list'] as $selected) {
            $checklist .= strtoupper($selected . ", ");
        }
    }

    //Check for business (NOT REQUIRED)
    if (empty($_POST["bname"])) {
        $business_error = "";
    } else {
        $business = clean_input($_POST["bname"]);
    }

    //Check for message (NOT REQUIRED)
    if (empty($_POST["message"])) {
        $message_error = "";
    } else {
        $message = clean_input($_POST["message"]);
    }

    // SET RECAPTCHA
    $recaptcha = $_POST['g-recaptcha-response'];
    $res = reCaptcha($recaptcha);

    // CHECK RECAPTCHA
    if ($res['success']) {
        //Check if all errors are empty then send construct email
        if ($fname_error == '' && $lname_error == '' && $email_error == '' && $checklist_error == '') {

            //Unset the post submission (for next load)
            unset($_POST['submit']);

            // Compose the email
            $composed_email = "";
            $composed_email .= "First Name: " . $fname . "<br>";
            $composed_email .= "Last Name: " . $lname . "<br>";
            $composed_email .= "Email: " . $email . "<br>";
            $composed_email .= "Interests: " . $checklist . "<br>";
            $composed_email .= "Business Name: " . $business . "<br>";
            $composed_email .= "Message: " . $message . "<br>";

            // Create a new PHPMailer object
            $mail = new PHPMailer(true);

            // Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_OFF;                              // Enable verbose debug output
            // $mail->isSMTP();                                                 // Send using SMTP
            // $mail->Host       = 'smtp.gmail.com';                            // Set the SMTP server to send through
            // $mail->SMTPAuth   = true;                                        // Enable SMTP authentication
            // $mail->Username   = $_ENV['FROM_EMAIL'];                         // SMTP username
            // $mail->Password   = $_ENV['FROM_EMAIL_PASS'];                    // SMTP password
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;              // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            // $mail->Port       = 587;                                         // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            // SMTP Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host       = $_ENV["SMTP_HOST"];
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV["FROM_EMAIL"];
            $mail->Password   = $_ENV["FROM_EMAIL_PASS"];
            $mail->Port       = 587;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            // Test Settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            // $mail->isSMTP();
            // $mail->Host       = 'smtp.gmail.com';
            // $mail->SMTPAuth   = true;
            // $mail->Username   = $_ENV['FROM_EMAIL'];
            // $mail->Password   = $_ENV['FROM_EMAIL_PASS'];
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            // $mail->Port       = 465;

            //Recipients
            $mail->setFrom($_ENV['FROM_EMAIL'], 'Vingroupcpa Website');  // Set default address that emails are sent from
            $mail->addAddress($_ENV['TO_EMAIL'], 'Vingroupcpa');             // Add a recipient

            // Content
            $mail->isHTML(true);                                             // Set email format to HTML
            $mail->Subject = 'Request More Information From Website';        // Subject
            $mail->Body    = $composed_email;                                // Body
            $mail->AltBody = $composed_email;                                // Alt. Body

            // Send the email
            if ($mail->send()) {
                $mailsend_success = "Message sent! Thank you for contacting us.";
                echo '<script>alert("' . $mailsend_success . '")</script>';
                reset_form_data();
            } else {
                $mailsend_error = "Message could not be sent. Mailer Error: {" . $mail->ErrorInfo . "}";
                echo '<script>alert("' . $mailsend_error . '")</script>';
                reset_form_data();
            }
        }
    } else {
        echo '<script>alert("ERROR: ReCaptcha Not Successful")</script>';
    }
}

function reCaptcha($recaptcha)
{
    $secret = $_ENV['SECRET_KEY'];
    $ip = $_SERVER['REMOTE_ADDR'];

    $postvars = array("secret" => $secret, "response" => $recaptcha, "remoteip" => $ip);
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
    $data = curl_exec($ch);
    curl_close($ch);
    return json_decode($data, true);
}

function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function reset_form_data()
{
    // Reset all form values
    $fname = $lname = $email = $checklist = $business = $message = "";
    $fname_error = $lname_error = $email_error = $checklist_error = $business_error = $message_error = $mailsend_success = $mailsend_error = "";
}
