<?php
 require "admin_dash.php";
require 'config.php'; // Include your database connection configuration

// SQL query to select staff_id, username, and contact_number
$sql = "SELECT staff_id, username, contact_number FROM staff WHERE is_admin = 0";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Staff ID: " . $row["staff_id"]. " - Username: " . $row["username"]. " - Contact Number: " . $row["contact_number"]. "<br>";
    }
} else {
    echo "No records found";
}

// Close the database connection
mysqli_close($conn);
?>
