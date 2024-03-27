<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get form data
  $service = filter_var($_POST['service'], FILTER_SANITIZE_STRING);
  $customService = filter_var($_POST['customService'], FILTER_SANITIZE_STRING);
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
  $additionalInfo = filter_var($_POST['additionalInfo'], FILTER_SANITIZE_STRING);

  // Email configuration
  $recipient = "mamushbruce@gmail.com"; // Replace with your actual email
  $subject = "Booking Inquiry from Website";

  // Create email body
  $body = "Service: $service\n";
  if ($customService != '') {
      $body .= "Custom Service: $customService\n";
  }
  $body .= "Name: $name\n";
  $body .= "Email: $email\n";
  $body .= "Phone: $phone\n";
  $body .= "Additional Information:\n$additionalInfo";

  // Set email headers (optional)
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  // Send email
  if (mail($recipient, $subject, $body, $headers)) {
    echo "Thank you for your booking inquiry! We will be in touch soon.";
  } else {
    echo "There was an error sending your inquiry. Please try again later.";
  }

} else {
  // Redirect or display an error message if accessed directly
  header('Location: index.html'); // Replace with your actual index page
  exit;
}


