<?php
// Start session
session_start();

// Check if the user is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: registerAndLogin.php'); // Redirect to login page if not admin
    exit;
}

// Include database connection
include 'db_connection.php';

// Fetch stats from the database
$petCountQuery = "SELECT COUNT(*) AS total_pets FROM pets";
$petCountResult = mysqli_query($conn, $petCountQuery);
$petCount = mysqli_fetch_assoc($petCountResult)['total_pets'];

$availablePetCountQuery = "SELECT COUNT(*) AS available_pets FROM pets WHERE status = 'available'";
$availablePetCountResult = mysqli_query($conn, $availablePetCountQuery);
$availablePetCount = mysqli_fetch_assoc($availablePetCountResult)['available_pets'];

$pendingApplicationsQuery = "SELECT COUNT(*) AS pending_applications FROM adoptionapplication WHERE status = 'pending'";
$pendingApplicationsResult = mysqli_query($conn, $pendingApplicationsQuery);
$pendingApplications = mysqli_fetch_assoc($pendingApplicationsResult)['pending_applications'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - PetPal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Include Sidebar -->
        <?php include 'includes/sidebar.php'; ?>
        

        <!-- Main Content -->
        <div class="col-md-9 content">
            <h1 class="mb-4">Welcome, Admin</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="stat-card text-center">
                        <h3>Total Pets</h3>
                        <p class="display-5"><?php echo $petCount; ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card text-center">
                        <h3>Available Pets</h3>
                        <p class="display-5"><?php echo $availablePetCount; ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card text-center">
                        <h3>Pending Applications</h3>
                        <p class="display-5"><?php echo $pendingApplications; ?></p>
                    </div>
                </div>
            </div>
            
            <!-- Pet Listings -->
            <div class="my-5">
                <h2>Recent Pets</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Breed</th>
                            <th>Age</th>
                            <th>Size</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $petsQuery = "SELECT id, name, breed, age, size, status FROM pets ORDER BY created_at DESC LIMIT 5";
                        $petsResult = mysqli_query($conn, $petsQuery);
                        while ($pet = mysqli_fetch_assoc($petsResult)) {
                            echo "<tr>";
                            echo "<td>{$pet['id']}</td>";
                            echo "<td>{$pet['name']}</td>";
                            echo "<td>{$pet['breed']}</td>";
                            echo "<td>{$pet['age']}</td>";
                            echo "<td>{$pet['size']}</td>";
                            echo "<td>{$pet['status']}</td>";
                            echo "<td><a href='edit_pet.php?id={$pet['id']}' class='btn btn-primary btn-sm'>Edit</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Adoption Applications -->
            <!-- <div class="my-5">
                <h2>Pending Adoption Applications</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Applicant Name</th>
                            <th>Pet ID</th>
                            <th>Application Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $applicationsQuery = "SELECT application_id, applicant_name, pet_id, application_date, status FROM adoptionapplication WHERE status = 'pending' ORDER BY application_date DESC";
                        $applicationsResult = mysqli_query($conn, $applicationsQuery);
                        while ($application = mysqli_fetch_assoc($applicationsResult)) {
                            echo "<tr>";
                            echo "<td>{$application['application_id']}</td>";
                            echo "<td>{$application['applicant_name']}</td>";
                            echo "<td>{$application['pet_id']}</td>";
                            echo "<td>{$application['application_date']}</td>";
                            echo "<td>{$application['status']}</td>";
                            echo "<td><a href='review_application.php?id={$application['application_id']}' class='btn btn-success btn-sm'>Review</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div> -->
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
