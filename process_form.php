<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $subject = test_input($_POST["subject"]);
    $message = test_input($_POST["message"]);

    // Validate form data (you can add more robust validation)
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "All fields are required.";
    } else {
        // Send email (you may need to configure your mail server)
        $to = "aryalmanisha100@gmail.com"; // Replace with your email address
        $headers = "From: $email";

        // Email content
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n";
        $email_content .= "Subject: $subject\n\n";
        $email_content .= "Message:\n$message";

        // Send email
        mail($to, $subject, $email_content, $headers);

        echo "Thank you for your message! We'll get back to you soon.";
    }
} else {
    // If the form is not submitted through POST method, redirect to the form page
    header("Location: contact_form.html");
    exit();
}

// Function to sanitize and validate form input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
