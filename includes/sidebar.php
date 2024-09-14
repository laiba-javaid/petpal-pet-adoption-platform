<?php
$page = basename($_SERVER['PHP_SELF']); // Get the current page name
?>

<div class="col-md-3 sidebar">
    <h2 class="text-center py-4">Admin Panel</h2>
    <a href="admin_dashboard.php" class="<?php echo ($page == 'admin_dashboard.php') ? 'active' : ''; ?>"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <a href="manage_pets.php" class="<?php echo ($page == 'manage_pets.php') ? 'active' : ''; ?>"><i class="bi bi-file-earmark-plus"></i> Manage Pets</a>
    <a href="manage_adoptions.php" class="<?php echo ($page == 'manage_adoptions.php') ? 'active' : ''; ?>"><i class="bi bi-clipboard-check"></i> Manage Adoption Applications</a>
    <a href="logout.php" class="<?php echo ($page == 'logout.php') ? 'active' : ''; ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>
</div>
