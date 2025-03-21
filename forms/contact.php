<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your email where the form will be sent
    $to = "rishi20101999@gmail.com"; // CHANGE THIS to your real email address

    // Get form data and sanitize
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // Validate email format
    if (!$email) {
        echo "Invalid email format.";
        exit;
    }

    // Email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Email body
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n\n";
    $email_body .= "Message:\n$message\n";

    // Send email using PHP mail()
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Your message has been sent successfully.";
    } else {
        echo "Error: Message not sent.";
    }
} else {
    echo "Invalid request.";
}
?>
