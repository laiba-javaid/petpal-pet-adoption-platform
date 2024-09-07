<?php
// Ensure the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Include database connection if needed
    // include 'db_connection.php';

    // Sanitize user input
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message_type = htmlspecialchars(trim($_POST['message_type']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email format']);
        exit();
    }

    // Send email (optional)
    $to = "laibajavaid423@gmail.com";  // Replace with your email
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nEnquiry: $message_type\nMessage: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(['status' => 'success', 'message' => 'Message sent successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send message.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Form not submitted correctly.']);
}
    

    // Optionally, store the message in a database
    /*
    $stmt = $conn->prepare("INSERT INTO contact_form (name, email, phone, message_type, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $message_type, $message);

    if ($stmt->execute()) {
        echo "Message saved successfully!";
    } else {
        echo "Failed to save message.";
    }
    $stmt->close();
    $conn->close();
    */

?>
