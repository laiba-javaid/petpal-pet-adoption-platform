<?php
// Include the database connection file
include('db_connection.php');  // Ensure the correct path to your db_connection.php file

// Check if the 'id' parameter is passed in the URL
if (isset($_GET['id'])) {
    // Get the application ID from the query string
    $application_id = $_GET['id'];

    // Sanitize the input to prevent SQL injection (optional but recommended)
    $application_id = mysqli_real_escape_string($conn, $application_id);

    // SQL query to delete the application record
    $query = "DELETE FROM adoptionapplication WHERE application_id = '$application_id'";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        // Redirect to manage_applications.php page after successful deletion
        header("Location: manage_adoptions.php?status=deleted");
        exit();
    } else {
        // If there's an error, display the error message
        echo "Error deleting application: " . mysqli_error($conn);
    }
} else {
    // If no ID is provided, show an error message or redirect to the manage applications page
    echo "No application ID provided.";
}

// Close the database connection
mysqli_close($conn);
?>
