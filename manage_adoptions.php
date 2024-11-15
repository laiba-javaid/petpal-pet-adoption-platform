<?php
// Include the database connection and sidebar
include 'db_connection.php';

// Fetch application statistics from the database
$totalApplicationsQuery = "SELECT COUNT(*) AS total FROM adoptionapplication";
$pendingApplicationsQuery = "SELECT COUNT(*) AS pending FROM adoptionapplication WHERE status = 'pending'";
$acceptedApplicationsQuery = "SELECT COUNT(*) AS accepted FROM adoptionapplication WHERE status = 'accepted'";
$rejectedApplicationsQuery = "SELECT COUNT(*) AS rejected FROM adoptionapplication WHERE status = 'rejected'";

$totalApplicationsResult = mysqli_query($conn, $totalApplicationsQuery);
$pendingApplicationsResult = mysqli_query($conn, $pendingApplicationsQuery);
$acceptedApplicationsResult = mysqli_query($conn, $acceptedApplicationsQuery);
$rejectedApplicationsResult = mysqli_query($conn, $rejectedApplicationsQuery);

// Fetch the result counts
$totalApplications = mysqli_fetch_assoc($totalApplicationsResult)['total'];
$pendingApplications = mysqli_fetch_assoc($pendingApplicationsResult)['pending'];
$acceptedApplications = mysqli_fetch_assoc($acceptedApplicationsResult)['accepted'];
$rejectedApplications = mysqli_fetch_assoc($rejectedApplicationsResult)['rejected'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Adoption Applications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="d-flex">
        <!-- Include Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="col-md-9 content">
            

            <!-- Notification Block at the top (initially hidden) -->
            <div id="updateNotification" class="alert alert-success alert-dismissible fade d-none" role="alert">
                Application updated successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <!-- Cards for Application Statistics -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Total Applications</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <span><?php echo $totalApplications; ?></span>
                            <a class="small text-white stretched-link" href="view_all_applications.php">View Applications</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Pending Applications</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <span><?php echo $pendingApplications; ?></span>
                            <a class="small text-white stretched-link" href="view_pending_applications.php">Review Pending</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Accepted Applications</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <span><?php echo $acceptedApplications; ?></span>
                            <a class="small text-white stretched-link" href="view_accepted_applications.php">View Accepted</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Rejected Applications</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <span><?php echo $rejectedApplications; ?></span>
                            <a class="small text-white stretched-link" href="view_rejected_applications.php">View Rejected</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other content for managing adoption applications can go here -->
             


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
