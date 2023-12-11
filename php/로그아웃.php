<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the home page or login page after logout
echo "<meta http-equiv='refresh' content='1 url=../home.php'>"; // Assuming the home page is named index.php
exit();
?>