<?php
// Establishing a connection to the MySQL database
$conn = new mysqli("localhost", "root", "", "razorpay");

// Checking if the connection was successful
if ($conn->connect_error) {
    // If connection failed, print an error message and terminate the script
    die("Unable to connect to the database: " . $conn->connect_error);
} else {
    // If connection was successful, print a success message
    echo "Database connected successfully!";
}
?>
