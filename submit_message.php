<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get form data
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $service = filter_var($_POST['service'], FILTER_SANITIZE_STRING); // Assuming service field is for subject
  $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

  // Email configuration
  $recipient = "mamushbruce@gmail.com"; // Replace with your actual email
  $subject = "Message from Website: $service"; // Subject prepended with service

  // Create email body
  $body = "Name: $name\n";
  $body .= "Email: $email\n";
  $body .= "Subject: $service\n";
  $body .= "Message:\n$message";

  // Set email headers (optional)
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  // Send email
  if (mail($recipient, $subject, $body, $headers)) {
    echo "Thank you for your message! We will respond to you soon.";
  } else {
    echo "There was an error sending your message. Please try again later.";
  }

} else {
  // Redirect or display an error message if accessed directly
  header('Location: index.html'); // Replace with your actual index page
  exit;
}


