<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['appointment_id'])) {
    $appointment_id = $_POST['appointment_id'];
    
    // Update the appointment status to 'approved'
    $updateQuery = "UPDATE appointments SET Status = 'approved' WHERE appointment_id = '$appointment_id'";
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: pending_appointment.php"); // Redirect back to admin home page
        exit();
    } else {
        echo "Error updating appointment status: " . mysqli_error($conn);
    }
} else {
    header("Location: pending_appointment.php"); // Redirect if no appointment ID provided
    exit();
}
?>
