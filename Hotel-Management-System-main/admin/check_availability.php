<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $RoomType = $_POST['RoomType'];

    // Query to check room availability
    $availabilityQuery = "SELECT 
                            (SELECT COUNT(*) FROM room WHERE type = '$RoomType') AS totalRooms,
                            (SELECT COUNT(*) FROM roombook WHERE RoomType = '$RoomType' AND stat = 'NotConfirm') AS bookedRooms";

    $result = mysqli_query($conn, $availabilityQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    } else {
        echo "error";
    }
}
?>
