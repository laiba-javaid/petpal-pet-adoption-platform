<?php
// update_application_status.php
include 'db_connection.php'; // Ensure your DB connection is included here

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $application_id = $_POST['application_id'];
    $status = $_POST['status'];

    // Sanitize inputs (to prevent SQL injection)
    $application_id = mysqli_real_escape_string($conn, $application_id);
    $status = mysqli_real_escape_string($conn, $status);

    // Update the application status in the database
    $query = "UPDATE adoptionapplication SET status='$status' WHERE application_id='$application_id'";

    if (mysqli_query($conn, $query)) {
        echo "Status updated successfully.";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
