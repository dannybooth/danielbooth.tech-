<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["Name"];
  $email = "daniel@danielbooth.tech";
  $message = $_POST["Message"];

  // Set the recipient email address
  $to = "daniel@danielbooth.tech"; // Replace with your actual email address

  // Set the email subject
  $subject = $_POST["Subject"];

  // Build the email body
  $body = "Name: " . $name . "\n";
  $body .= "Email: " .  $_POST["Email"] . "\n";
  $body .= "Message: " . $message;
  
  $mailer = new PHPMailer();
  // $mailer->SMTPDebug = SMTP::DEBUG_SERVER;
  
  $mailer->isSMTP();
  
  $mailer->Host = // Replace with your host
  $mailer->SMTPAuth = true;
  $mailer->Username = // Replace with your SMTP username
  $mailer->Password = // Replace with your SMTP password
  $mailer->SMTPSecure = // Use `PHPMailer::ENCRYPTION_SMTPS` for SMTPS
  $mailer->Port =// Replace with the appropriate port number
  
  $mailer->setFrom($email);
  $mailer->addAddress($to);
  
  $mailer->Subject = $subject;
  $mailer->Body = $body;

  // Send the email
  if ($mailer->send()) {
    echo "Email sent successfully!";
  } else {
    echo "Failed to send email. Error: " . $mailer->ErrorInfo;
  }
  
}
?>