<?php
// Include database connection
include 'db_connection.php';

// Initialize error variables
$nameErr = $emailErr = $phoneErr = $addressErr = $petNameErr = $reasonErr = "";
$name = $email = $phone = $address = $petname = $reason = "";

// Function to sanitize form inputs
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather form data and validate
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $phoneErr = "Invalid phone number format";
        }
    }
    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = test_input($_POST["address"]);
    }
    if (empty($_POST["petname"])) { // Fixed the input name
        $petNameErr = "Pet Name is required";
    } else {
        $petname = test_input($_POST["petname"]);
    }
    if (empty($_POST["reason"])) {
        $reasonErr = "Reason is required";
    } else {
        $reason = test_input($_POST["reason"]);
    }

    // If there are no errors, insert data into the database
    if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($addressErr) && empty($petNameErr) && empty($reasonErr)) {
        $sql = "INSERT INTO adoptionapplication (name, email, phone, address, petname, reason) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            echo "Error preparing statement: " . $conn->error;
        } else {
            $stmt->bind_param("ssssss", $name, $email, $phone, $address, $petname, $reason);
            if ($stmt->execute()) {
                header('Location: application_success.php');
            } else {
                echo "Error executing query: " . $stmt->error;
            }
            $stmt->close();
        }
    } else {
        // Display validation errors
        echo "Please fix the following errors:<br>";
        echo $nameErr . "<br>";
        echo $emailErr . "<br>";
        echo $phoneErr . "<br>";
        echo $addressErr . "<br>";
        echo $petNameErr . "<br>";
        echo $reasonErr . "<br>";
    }
}

// Close connection only if it was successfully opened
if ($conn) {
    $conn->close();
}
?>
