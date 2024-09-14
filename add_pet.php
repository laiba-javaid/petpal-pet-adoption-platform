<?php
// Include database connection
include 'db_connection.php';

// Initialize variables
$name = $breed = $age = $color = $description = $pet_type = $gender = $size = $vaccinated = $status = '';
$imageNameNew = '';
$editMode = false;

// Check if we're editing an existing pet
if (isset($_GET['id'])) {
    $editMode = true;
    $pet_id = $_GET['id'];

    // Fetch the existing pet details from the database
    $query = "SELECT * FROM pets WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $pet_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $pet = $result->fetch_assoc();
        $name = $pet['name'];
        $breed = $pet['breed'];
        $age = $pet['age'];
        $color = $pet['color'];
        $description = $pet['description'];
        $pet_type = $pet['pet_type'];
        $gender = $pet['gender'];
        $size = $pet['size'];
        $vaccinated = $pet['vaccinated'];
        $status = $pet['status'];
        $imageNameNew = $pet['image']; // Load existing image
    }
    $stmt->close();
}


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
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
    
    // Handle file upload
    $image = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];
    $imageType = $_FILES['image']['type'];
    
    $imageExt = explode('.', $image);
    $imageActualExt = strtolower(end($imageExt));
    
    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    // Check if the 'uploads' directory exists, if not, create it
    if (!is_dir('uploads')) {
    mkdir('uploads', 0777, true);
    }
    
    if (in_array($imageActualExt, $allowed)) {
        if ($imageError === 0) {
            if ($imageSize < 1000000) { // Limit file size to 1MB
                $imageNameNew = uniqid('', true) . "." . $imageActualExt;
                $imageDestination = 'assets/images/' . $imageNameNew;
                
                // Move the uploaded file to the 'uploads' directory
                move_uploaded_file($imageTmpName, $imageDestination);
            } else {
                echo "Your file is too big!";
                exit();
            }
        } else {
            echo "There was an error uploading your file!";
            exit();
        }
    } else {
        echo "You cannot upload files of this type!";
        exit();
    }

    // Prepare SQL query
    if ($editMode) {
        // Update existing pet in the database
        $sql = "UPDATE pets SET name = ?, breed = ?, age = ?, color = ?, description = ?, image = ?, pet_type = ?, gender = ?, size = ?, vaccinated = ?, status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssissssssssi", $name, $breed, $age, $color, $description, $imageNameNew, $pet_type, $gender, $size, $vaccinated, $status, $pet_id);
    } else {
        // Add new pet to the database
        $sql = "INSERT INTO pets (name, breed, age, color, description, image, pet_type, gender, size, vaccinated, status)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssissssssss", $name, $breed, $age, $color, $description, $imageNameNew, $pet_type, $gender, $size, $vaccinated, $status);
    }

    if ($stmt->execute()) {
        echo $editMode ? "Pet updated successfully!" : "Pet added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
