<?php
// Include database connection
include 'db_connection.php';

// Get pet ID from the request
if (isset($_GET['id'])) {
    $petId = $_GET['id'];

    // Prepare SQL query to fetch pet details
    $query = "SELECT * FROM pets WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $petId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch pet data
    if ($result->num_rows > 0) {
        $pet = $result->fetch_assoc();
        // Return pet details as JSON
        echo json_encode($pet);
    } else {
        echo json_encode(['error' => 'Pet not found']);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
