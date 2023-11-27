<?php
include '../config.php';

// Query to count the number of bookings
$countQuery = "SELECT COUNT(*) AS count FROM roombook";

$result = mysqli_query($conn, $countQuery);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode(['count' => $row['count']]);
} else {
    echo json_encode(['error' => true]);
}
?>
