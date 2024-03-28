<?php
// Error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Function to sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Validate form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    
    // Validate required fields
    $required_fields = ['name', 'email', 'phone'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "Please fill in all required fields.";
            break;
        }
    }

    // Sanitize form data
    $name = sanitize_input($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = sanitize_input($_POST['phone']);
    $service = sanitize_input($_POST['service'] ?? '');
    $customService = sanitize_input($_POST['customService'] ?? '');
    $additionalInfo = sanitize_input($_POST['additionalInfo'] ?? '');

    // Check for valid email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    // Check if there are any errors
    if (empty($errors)) {
        // Email configuration
        $recipient = "mamushbruce@gmail.com"; // Replace with your actual email
        $subject = "Booking Inquiry from Website";

        // Create email body
        $body = "Service: $service\n";
        if (!empty($customService)) {
            $body .= "Custom Service: $customService\n";
        }
        $body .= "Name: $name\n";
        $body .= "Email: $email\n";
        $body .= "Phone: $phone\n";
        $body .= "Additional Information:\n$additionalInfo";

        // Set email headers
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
        // Display validation errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
} else {
    // Redirect or display an error message if accessed directly
    echo "Error: Form submission method not allowed.";
}
?>
