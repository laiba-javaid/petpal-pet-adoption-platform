

<?php
header('Content-Type: application/json');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php'; // Include the database connection

// Check if the ID is provided in the GET request
if (isset($_GET['application_id'])) {
    $applicationId = intval($_GET['application_id']); // Sanitize input

    // Query to fetch application details
    $query = "SELECT * FROM adoptionapplication WHERE application_id = $applicationId";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $application = mysqli_fetch_assoc($result);

        // Prepare the data to be returned as JSON
        $data = [
            'id' => $application['application_id'],
            'adopter_name' => $application['applicant_name'],
            'pet_name' => $application['pet_name'], // Adjust this field name to match your database column
            'status' => $application['status'],
            'submitted_at' => $application['application_date'],
            'message' => $application['message'] // Adjust if needed
        ];

        // Return the data as a JSON response
        echo json_encode($data);
    } else {
        // Return an error message if the application was not found
        echo json_encode(['error' => 'Application not found']);
    }
} else {
    // Return an error if no ID is provided
    echo json_encode(['error' => 'No application ID provided']);
}

// Close the database connection
mysqli_close($conn);
?>
