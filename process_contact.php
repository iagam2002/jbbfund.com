<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["your-name"]);
    $email = filter_var($_POST["your-email"], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST["your-phone"]);
    $message = htmlspecialchars($_POST["your-message"]);

    $to = "your_email@example.com"; // Change this to your email
    $subject = "New Contact Form Submission from " . $name;
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8";

    $body = "You have received a new message from your website contact form.\n\n" .
            "Name: $name\n" .
            "Email: $email\n" .
            "Phone: $phone\n" .
            "Message:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message could not be sent. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
