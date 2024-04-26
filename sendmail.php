<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form input (example: check if required fields are filled)
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
        echo "Please fill in all required fields.";
        exit();
    }

    // Sanitize form input (example: remove any potentially malicious content)
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $message = htmlspecialchars($_POST['message']);

    // Construct email message
    $to = "murerwadenis55@gmail.com"; 
    $subject = "New Message from your website";
    $body = "Name: $name\nEmail: $email\nPhone: $phone\n\n$message";

    // Send email
    if (mail($to, $subject, $body)) {
        header("Location: contact.html");
        exit();
    } else {
        echo "Oops! Something went wrong. Please try again later.";
        // You can log the error or provide more detailed error message if needed
    }
}
?>
