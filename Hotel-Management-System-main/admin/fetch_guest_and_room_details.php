<?php
// Your database connection code here
include '../config.php';
// Join query to fetch guest and room details
$joinQuery = "SELECT roombook.*, room.* FROM roombook
              INNER JOIN room ON roombook.RoomType = room.type";
$result = mysqli_query($conn, $joinQuery);

// Display the results in GUI
echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Room Type</th>
        <th>Check-In</th>
        <th>Check-Out</th>
    </tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['Email'] . "</td>";
    echo "<td>" . $row['RoomType'] . "</td>";
    echo "<td>" . $row['cin'] . "</td>";
    echo "<td>" . $row['cout'] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Close the database connection
mysqli_close($conn);
?>
