<?php
include('connection.php');
session_start();

date_default_timezone_set("Asia/Kolkata");

// Check if the payment_id and product_id are set in the POST data
if (isset($_POST['payment_id'], $_POST['product_id'])) {
    $paymentid = $_POST['payment_id'];
    $productid = $_POST['product_id'];
    $dt = date('Y-m-d H:i:s');

    // Prepare the SQL statement
    $sql = "INSERT INTO orders (product_id, payment_id, added_date) VALUES ('$productid', '$paymentid', '$dt')";
    
    // Execute the SQL statement
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Set session variable for payment ID
        $_SESSION['paymentid'] = $paymentid;
        // Return 'done' to indicate successful insertion
        echo 'done';
    } else {
        // Return an error message if the query fails
        echo "error: " . mysqli_error($conn);
    }
} else {
    // Return an error message if payment_id or product_id is not set
    echo "error: Payment ID or Product ID not provided.";
}
?>
