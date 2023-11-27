<?php
include 'config.php';

// Establish a database connection
$conn = mysqli_connect($server,$username,$password,$database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL commands for trigger and procedure
$sql1 = "
CREATE TRIGGER update_finaltotal
AFTER INSERT ON roombook
FOR EACH ROW
BEGIN
    DECLARE room_total double(8,2);
    DECLARE bed_total double(8,2);
    DECLARE meal_total double(8,2);

    -- Calculate room_total, bed_total, meal_total based on the new booking
    SELECT roomtotal, bedtotal, mealtotal
    INTO room_total, bed_total, meal_total
    FROM payment
    WHERE id = NEW.id;

    -- Update finaltotal in payment table
    UPDATE payment
    SET finaltotal = room_total + bed_total + meal_total
    WHERE id = NEW.id;
END
";

$sql2 = "
CREATE PROCEDURE get_booking_details(IN booking_id INT)
BEGIN
    SELECT *
    FROM roombook
    WHERE id = booking_id;
END
";

// Execute SQL commands
if (mysqli_multi_query($conn, $sql1 . $sql2)) {
    echo "Trigger and procedure created successfully";
} else {
    echo "Error creating trigger and procedure: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
