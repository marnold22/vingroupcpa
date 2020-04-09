<?php 
    require_once("PHPMailer/src/PHPMailer.php");

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '587';
    $mail->isHTML();
    $mail->Username = '';
    $mail->Password = '';
    $mail->SetFrom('');
    $mail->Subject = 'Hello World';
    $email->Body = 'This is a test email!';
    $mail->AddAddress('');

    $mail->Send();



?>