<?php
// getBookingDetails.php
include '../config.php';

$conn = mysqli_connect($server,$username,$password,$database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get booking ID from the query parameters
$bookingId = mysqli_real_escape_string($conn, $_GET['bookingId']);

// Execute a stored procedure to get booking details
$sql = "CALL get_booking_details($bookingId)";
$result = mysqli_query($conn, $sql);

if ($result) {
    $bookingDetails = mysqli_fetch_assoc($result);
    echo json_encode($bookingDetails);
} else {
    echo json_encode(['error' => 'Unable to fetch booking details']);
}

mysqli_close($conn);
?>
