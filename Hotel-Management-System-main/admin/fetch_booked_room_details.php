<?php
include '../config.php';
// Your database connection code here

// Query to fetch booked room details
$nestedQuery = "SELECT * FROM roombook WHERE RoomType IN (SELECT DISTINCT type FROM room)";
$result = mysqli_query($conn, $nestedQuery);

// Display the results in GUI
echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Room Type</th>
        <th>Check-In</th>
        <th>Check-Out</th>
    </tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['RoomType'] . "</td>";
    echo "<td>" . $row['cin'] . "</td>";
    echo "<td>" . $row['cout'] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Close the database connection
mysqli_close($conn);
?>
