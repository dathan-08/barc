<!DOCTYPE html>
<html>
<head>
    <title>Generate Report</title>
</head>
<body>
    <h1>Generate Report</h1>
    <h2>Appointment Details</h2>
    <!-- Display appointment details here -->

    <h2>Enter Report Values</h2>
    <form Action="" method="post">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <input type="hidden" name="appointment_id" value="<?php echo $appointment_id; ?>">
        <label for="ldl">LDL:</label>
        <input type="number" step="0.01" name="ldl" required><br>
        <label for="hdl">HDL:</label>
        <input type="number" step="0.01" name="hdl" required><br>
        <label for="triglycerides">Triglycerides:</label>
        <input type="number" step="0.01" name="triglycerides" required><br>
        <label for="hba1c">HbA1c:</label>
        <input type="number" step="0.01" name="hba1c" required><br>
        <button type="submit">Submit Report</button>
    </form>
</body>
</html>

<?php
// Include necessary files and configurations
require 'config.php';

// Retrieve user_id and appointment_id from query parameters
$user_id = $_GET['user_id'];
$appointment_id = $_GET['appointment_id'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ldl = $_POST['ldl'];
    $hdl = $_POST['hdl'];
    $triglycerides = $_POST['triglycerides'];
    $hba1c = $_POST['hba1c'];

    // Insert the values into the reports table
    $insertQuery = "INSERT INTO reports (user_id, appointment_id, ldl, hdl, triglycerides, hba1c)
                    VALUES ('$user_id', '$appointment_id', '$ldl', '$hdl', '$triglycerides', '$hba1c')";
    if (mysqli_query($conn, $insertQuery)) {
        // Redirect back to the approved appointments page
        header("Location: staff_appointments.php");
        exit();
    } else {
        echo "Error inserting report: " . mysqli_error($conn);
    }
}

// ... (fetch appointment details and display)
// For demonstration purposes, let's assume $appointmentDetails is fetched from the database.
?>
