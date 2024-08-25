<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing password
    $role = 'user';

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo json_encode(["message" => "User already exists"]);
    } else {
        $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['user'] = ['username' => $username, 'email' => $email];
            echo json_encode(["message" => "User created successfully"]);
        } else {
            echo json_encode(["message" => "Error: " . mysqli_error($conn)]);
        }
    }
}

$conn->close();
?>
