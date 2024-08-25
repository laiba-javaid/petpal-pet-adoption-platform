<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'user';

    // Check if user already exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User already exists
        $redirectUrl = 'application_success.php?type=signup&status=error&message=User already exists';
        header("Location: $redirectUrl");
        exit();
    } else {
        $stmt->close();

        // Insert new user
        $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $username, $email, $password, $role);

        if ($stmt->execute()) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            // Redirect to the success page
            $redirectUrl = 'application_success.php?type=signup&status=success&role=user';
            header("Location: $redirectUrl");
            exit();
        } else {
            // Error during insertion
            $redirectUrl = 'application_success.php?type=signup&status=error&message=Error%3A%20' . urlencode($conn->error);
            header("Location: $redirectUrl");
            exit();
        }
    }

    $stmt->close();
}
$conn->close();
?>
