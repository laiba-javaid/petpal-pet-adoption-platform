<?php
// Include the database connection and sidebar
include 'db_connection.php';

// Fetch application statistics from the database
$totalApplicationsQuery = "SELECT COUNT(*) AS total FROM adoptionapplication";
$pendingApplicationsQuery = "SELECT COUNT(*) AS pending FROM adoptionapplication WHERE status = 'pending'";
$acceptedApplicationsQuery = "SELECT COUNT(*) AS accepted FROM adoptionapplication WHERE status = 'approved'";
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
<style>
    .card{
        background-color: #F0F8FF; 
        display: flex;
        height: 100%;   
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .button-container 
    {
        display:flex;
        flex-direction: row;
        
    }
    .applications-text {
    font-weight: bold;
    font-size: 1.2rem; 
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.applications-count {
    font-size: 1.5rem; 
    font-weight: bold;
    color:#2F5D6E;
}
.btn-card {
    font-size: 1rem; /* Smaller font size for the button */
    padding: 5px 10px; /* Adjust padding if needed */
}
    </style>

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
<div class="row d-flex justify-content-start">
    <div class="col-12 col-md-3 mb-4">
        <div class="card text-bold">
            <div class="card-body">
                <span class="applications-text">Total Applications</span>
            </div>
            <span class="applications-count"><?php echo $totalApplications; ?></span>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <button class="btn btn-card" type="button" data-bs-toggle="collapse" data-bs-target="#applicationList" aria-expanded="false" aria-controls="applicationList">
                    View All Applications
                </button>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-3 mb-4">
        <div class="card text-bold">
            <div class="card-body">
                <span class="applications-text">Pending Applications</span>
            </div>
            <span class="applications-count"><?php echo $pendingApplications; ?></span>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <button class="btn btn-card" type="button" data-bs-toggle="collapse" data-bs-target="#pendingApplications" aria-expanded="false" aria-controls="pendingApplications">
                    Review Pending
                </button>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-3 mb-4">
        <div class="card text-bold">
            <div class="card-body">
                <span class="applications-text">Accepted Applications</span>
            </div>
            <span class="applications-count"><?php echo $acceptedApplications; ?></span>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <button class="btn btn-card" type="button" data-bs-toggle="collapse" data-bs-target="#acceptedApplications" aria-expanded="false" aria-controls="acceptedApplications">
                    View Accepted
                </button>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-3 mb-4">
        <div class="card text-bold">
            <div class="card-body">
                <span class="applications-text">Rejected Applications</span>
            </div>
            <span class="applications-count"><?php echo $rejectedApplications; ?></span>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <button class="btn btn-card" type="button" data-bs-toggle="collapse" data-bs-target="#rejectedApplications" aria-expanded="false" aria-controls="rejectedApplications">
                    View Rejected
                </button>
            </div>
        </div>
    </div>  
</div>


            <!-- View All Applications -->
            <div class="collapse " id="applicationList">
             <div class="my-5">
        <h2>All Applications List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Applicant Name</th>
                    <th>Application Date</th>
                    <th>Status</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php

                // Fetch applications from the database
                $query = "SELECT * FROM adoptionapplication ORDER BY application_date DESC";
                $result = mysqli_query($conn, $query);

                while ($application = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$application['application_id']}</td>";
                    echo "<td>{$application['applicant_name']}</td>";
                    echo "<td>{$application['application_date']}</td>";
                    // Display status
                $status = $application['status'];
                if ($status == 'approved') {
                    echo "<td><span class='badge bg-success'>Accepted</span></td>";
                } elseif ($status == 'rejected') {
                    echo "<td><span class='badge bg-danger'>Rejected</span></td>";
                } else {
                    echo "<td><span class='badge bg-warning'>Pending</span></td>";
                }
                echo "<td><button class='btn btn-info btn-sm' onclick='viewApplicationDetails({$application['application_id']})'>View Full Application</button></td>";
  
                   // Action buttons
                echo "<td class='actions-buttons'>";

                // Approve/Reject buttons are not needed here unless specifically required to show for pending applications
                if ($status == 'pending') {
                    echo "<button class='btn btn-success btn-sm me-2 mb-2' onclick='approveApplication({$application['application_id']})'>Approve</button>";
                    echo "<button class='btn btn-warning btn-sm me-2 mb-2' onclick='rejectApplication({$application['application_id']})'>Reject</button>";
                }

                // Change status and delete buttons
                echo "<button class='btn btn-secondary btn-sm me-2 mb-2' onclick='changeStatus({$application['application_id']})'>Change Status</button>";
                echo "<a href='delete_application.php?id={$application['application_id']}' class='btn btn-danger btn-sm me-2 mb-2' onclick='return confirm(\"Are you sure?\")'>Delete Application</a>";
                echo "</td>";

                echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal for viewing application details -->
<div class="modal fade" id="applicationDetailModal" tabindex="-1" aria-labelledby="applicationDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applicationDetailModalLabel">Application Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Application details will be loaded here dynamically -->
                <table class="table table-bordered">
                    <tr><th>Application ID</th><td id="application-id"></td></tr>
                    <tr><th>Adopter Name</th><td id="application-adopter-name"></td></tr>
                    <tr><th>Pet Name</th><td id="application-pet-name"></td></tr>
                    <tr><th>Status</th><td id="application-status"></td></tr>
                    <tr><th>Submitted Date</th><td id="application-submitted-date"></td></tr>
                    <tr><th>Message</th><td id="application-message"></td></tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal for Changing Status -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel">Change Application Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="statusSelect">Select New Status:</label>
                <select id="statusSelect" class="form-select">
                    <option value="pending">Pending</option>
                    <option value="approved">Accepted</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveStatusChange()">Save changes</button>
            </div>
        </div>
    </div>
</div>
 
            
            
           <!-- View Pending Applications -->
<div class="collapse" id="pendingApplications">
    <div class="my-5">
        <h2>Pending Applications</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Applicant Name</th>
                    <th>Application Date</th>
                    <th>Status</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch only pending applications from the database
                $query = "SELECT * FROM adoptionapplication WHERE status = 'pending' ORDER BY application_date DESC";
                $result = mysqli_query($conn, $query);

                // Loop through the fetched applications
                while ($application = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$application['application_id']}</td>";
                    echo "<td>{$application['applicant_name']}</td>";
                    echo "<td>{$application['application_date']}</td>";

                    // Display status for each application
                    echo "<td><span class='badge bg-warning'>Pending</span></td>";

                    // Details button for the application
                    echo "<td><button class='btn btn-info btn-sm' onclick='viewApplicationDetails({$application['application_id']})'>View Full Application</button></td>";
                    
                    // Action buttons (Approve/Reject) only for pending applications
                    echo "<td class='actions-buttons'>";
                    echo "<button class='btn btn-success btn-sm me-2 mb-2' onclick='approveApplication({$application['application_id']})'>Approve</button>";
                    echo "<button class='btn btn-warning btn-sm me-2 mb-2' onclick='rejectApplication({$application['application_id']})'>Reject</button>";
                    echo "<button class='btn btn-secondary btn-sm me-2 mb-2' onclick='changeStatus({$application['application_id']})'>Change Status</button>";
                    echo "<a href='delete_application.php?id={$application['application_id']}' class='btn btn-danger btn-sm me-2 mb-2' onclick='return confirm(\"Are you sure?\")'>Delete Application</a>";
                    echo "</td>";

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- View Accepted Applications -->
<div class="collapse" id="acceptedApplications">
    <div class="my-5">
        <h2>Accepted Applications</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Applicant Name</th>
                    <th>Application Date</th>
                    <th>Status</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch only accepted applications from the database
                $query = "SELECT * FROM adoptionapplication WHERE status = 'approved' ORDER BY application_date DESC";
                $result = mysqli_query($conn, $query);

                // Loop through the fetched applications
                while ($application = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$application['application_id']}</td>";
                    echo "<td>{$application['applicant_name']}</td>";
                    echo "<td>{$application['application_date']}</td>";

                    // Display status for each application
                    echo "<td><span class='badge bg-success'>Accepted</span></td>";

                    // Details button for the application
                    echo "<td><button class='btn btn-info btn-sm' onclick='viewApplicationDetails({$application['application_id']})'>View Full Application</button></td>";
                    
                    // Action buttons (Only show Change Status and Delete for accepted applications)
                    echo "<td class='actions-buttons'>";
                    echo "<button class='btn btn-secondary btn-sm me-2 mb-2' onclick='changeStatus({$application['application_id']})'>Change Status</button>";
                    echo "<a href='delete_application.php?id={$application['application_id']}' class='btn btn-danger btn-sm me-2 mb-2' onclick='return confirm(\"Are you sure?\")'>Delete Application</a>";
                    echo "</td>";

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- View Rejected Applications -->
<div class="collapse" id="rejectedApplications">
    <div class="my-5">
        <h2>Rejected Applications</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Applicant Name</th>
                    <th>Application Date</th>
                    <th>Status</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch only rejected applications from the database
                $query = "SELECT * FROM adoptionapplication WHERE status = 'rejected' ORDER BY application_date DESC";
                $result = mysqli_query($conn, $query);

                // Loop through the fetched applications
                while ($application = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$application['application_id']}</td>";
                    echo "<td>{$application['applicant_name']}</td>";
                    echo "<td>{$application['application_date']}</td>";

                    // Display status for each application
                    echo "<td><span class='badge bg-danger'>Rejected</span></td>";

                    // Details button for the application
                    echo "<td><button class='btn btn-info btn-sm' onclick='viewApplicationDetails({$application['application_id']})'>View Full Application</button></td>";
                    
                    // Action buttons (Only show Change Status and Delete for rejected applications)
                    echo "<td class='actions-buttons'>";
                    echo "<button class='btn btn-secondary btn-sm me-2 mb-2' onclick='changeStatus({$application['application_id']})'>Change Status</button>";
                    echo "<a href='delete_application.php?id={$application['application_id']}' class='btn btn-danger btn-sm me-2 mb-2' onclick='return confirm(\"Are you sure?\")'>Delete Application</a>";
                    echo "</td>";

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


            
        </div>
    </div>
    <script >
        // Function to view application details
        function viewApplicationDetails(applicationId) {
    $.ajax({
        url: 'get_application_details.php',
        type: 'GET',
        data: { id: applicationId },
        success: function(response) {
            try {
                var application = JSON.parse(response);

                if (data.error) {
                    alert("Error: " + data.error);
                    return;
                }

                // Fill the modal with the application details
                $('#application-id').text(application.application_id);
                $('#application-adopter-name').text(application.adopter_name);
                $('#application-pet-name').text(application.pet_name);
                $('#application-status').text(application.status);
                $('#application-submitted-date').text(application.submitted_at);
                $('#application-message').text(application.message);

                // Show the modal
                $('#applicationDetailModal').modal('show');
            } catch (e) {
                alert("Error parsing JSON response: " + e.message);
            }
        },
        error: function(xhr, status, error) {
            alert("AJAX request failed: " + error "\nResponse Text: " + xhr.responseText);
        }
    });
}
// Approve the application
function approveApplication(applicationId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_application_status.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Update the status on the page dynamically
            alert("Application Approved");
            location.reload(); // Reload the page to reflect changes
        }
    };
    xhr.send("application_id=" + applicationId + "&status=accepted");
}

// Reject the application
function rejectApplication(applicationId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_application_status.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Update the status on the page dynamically
            alert("Application Rejected");
            location.reload(); // Reload the page to reflect changes
        }
    };
    xhr.send("application_id=" + applicationId + "&status=rejected");
}

let applicationIdToUpdate = null; // To store the application ID of the selected row

// When the "Change Status" button is clicked
function changeStatus(applicationId) {
    applicationIdToUpdate = applicationId; // Store the selected application ID

    // Open the modal
    $('#statusModal').modal('show');
}

// Function to save the status change
function saveStatusChange() {
    const newStatus = document.getElementById('statusSelect').value; // Get the selected status

    // AJAX request to update the status in the database
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_application_status.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Close the modal
            $('#statusModal').modal('hide');
            
            // Update the status in the table row dynamically (or reload the page to reflect the change)
            alert('Status updated to ' + newStatus);
            location.reload(); // Reload the page to reflect the updated status
        }
    };
    xhr.send("application_id=" + applicationIdToUpdate + "&status=" + newStatus);
}

        </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
