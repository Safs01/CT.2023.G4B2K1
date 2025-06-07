<?php
// Display errors (optional, for debugging)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Clean & correct InfinityFree DB credentials
$servername = "sql309.infinityfree.com";         // Your MySQL host from control panel
$username   = "if0_39169105";                    // Your InfinityFree DB username (no spaces/tabs)
$password   = "X4yv9RGHnNw36R";                  // Your actual DB password
$dbname     = "if0_39169105_ecommerce_sa";       // The database name you created

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
