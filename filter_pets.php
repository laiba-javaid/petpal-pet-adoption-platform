<?php
// Include database connection
include 'db_connection.php';

// Build the SQL query based on filters
$sql = "SELECT * FROM pets WHERE 1=1";

if (isset($_GET['pet-type']) && !empty($_GET['pet-type'])) {
    $pet_type = $conn->real_escape_string($_GET['pet-type']);
    $sql .= " AND pet_type = '$pet_type'";
}

if (isset($_GET['name']) && !empty($_GET['name'])) {
    $name = $conn->real_escape_string($_GET['name']);
    $sql .= " AND name LIKE '%$name%'";
}

if (isset($_GET['breed']) && !empty($_GET['breed'])) {
    $breed = $conn->real_escape_string($_GET['breed']);
    $sql .= " AND breed = '$breed'";
}

if (isset($_GET['age']) && !empty($_GET['age'])) {
    $age = $conn->real_escape_string($_GET['age']);
    $age_range = explode("-", $age);
    $sql .= " AND age BETWEEN $age_range[0] AND $age_range[1]";
}

if (isset($_GET['color']) && !empty($_GET['color'])) {
    $color = $conn->real_escape_string($_GET['color']);
    $sql .= " AND color LIKE '%$color%'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Build the HTML structure dynamically
        echo '<div class="col">';
        echo '<div class="card" style="width: 17rem">';
        $imagePath = "/PetPal/assets/images/" . $row['image']; // Use correct column for image filename
        echo '<img src="' . $imagePath . '" class="card-img-top" alt="' . $row['name'] . '" />';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        echo '<p>Age: ' . $row['age'] . ' Years</p>';
        echo '<a href="/PetPal/petDetail.php?id=' . $row['id'] . '" class="btn btn-custom">View Details</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p>No pets match your criteria.</p>';
}

$conn->close();
?>
