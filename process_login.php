<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password, role FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password, $role);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Start the session and set session variables
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            if ($user_type === 'admin') {
                header("Location: /admin_dashboard.php"); // Redirect to admin dashboard
            } else {
                header("Location: /PetPal/index.php"); // Redirect to user dashboard
            }
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with that email!";
    }

    $stmt->close();
}
$conn->close();
?>
