<?php
// Start the session
session_start();

// Destroy the session to log the user out
session_destroy();

// Redirect to login page with a status message
header("Location: registerAndLogin.php?status=logged_out"); // Change to your login page URL
exit();
?>
