<?php
include 'db_connection.php'; // Include your DB connection file

// Get search parameters
$name = $_GET['name'] ?? '';
$breed = $_GET['breed'] ?? '';
$type = $_GET['type'] ?? '';

// Build the SQL query
$query = "SELECT * FROM pets WHERE 1"; // 1 means "no condition"

if ($name) {
    $query .= " AND name LIKE '%" . mysqli_real_escape_string($conn, $name) . "%'";
}
if ($breed) {
    $query .= " AND breed = '" . mysqli_real_escape_string($conn, $breed) . "'";
}
if ($type) {
    $query .= " AND pet_type = '" . mysqli_real_escape_string($conn, $type) . "'";
}

// Execute the query and fetch results
$result = mysqli_query($conn, $query);
$pets = [];

while ($pet = mysqli_fetch_assoc($result)) {
    $pets[] = $pet;
}

// Return results as JSON
echo json_encode($pets);
?>
