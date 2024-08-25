<?php
session_start();

// Include your database connection file
require_once 'db_connection.php';

// Assume you have form fields named 'email' and 'password'
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Query the database to check if the email and password are correct
$query = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Assuming the password is hashed, use password_verify
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $role = $user['role']; // Assume 'role' is a column in your 'users' table
        
        // Determine redirect URL based on role
        if ($role === 'admin') {
            $redirectUrl = 'application_success.php?type=login&role=admin';
        } else {
            $redirectUrl = 'application_success.php?type=login&role=user';
        }
        
        // Redirect to the success page
        header("Location: $redirectUrl");
        exit();
    } else {
        // Incorrect password
        $redirectUrl = 'application_success.php?type=login&role=none'; // No role or invalid credentials
        header("Location: $redirectUrl");
        exit();
    }
} else {
    // User not found
    $redirectUrl = 'application_success.php?type=login&role=none'; // No role or invalid credentials
    header("Location: $redirectUrl");
    exit();
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
