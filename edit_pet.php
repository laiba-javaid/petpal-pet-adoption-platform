<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pet_id = $_POST['id'];
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $color = $_POST['color'];
    $description = $_POST['description'];
    $pet_type = $_POST['pet_type'];
    $gender = $_POST['gender'];
    $size = $_POST['size'];
    $vaccinated = $_POST['vaccinated'];
    $status = $_POST['status'];

    // Query to update the pet details
    $query = "UPDATE pets SET name = '$name', breed = '$breed', age = $age, color = '$color', 
              description = '$description', pet_type = '$pet_type', gender = '$gender', 
              size = '$size', vaccinated = '$vaccinated', status = '$status' WHERE id = $pet_id";

    if (mysqli_query($conn, $query)) {
        header('Location: manage_pets.php?msg=Pet updated successfully');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
