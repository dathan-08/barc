<!DOCTYPE html>
<html>
<head>
    <title>Request Appointment</title>
</head>
<body>
    <h2>Request an Appointment</h2>
    
    <?php
    require 'dashboard.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['date']) && isset($_POST['time'])) {
            $requestedDate = $_POST['date'];
            $requestedTime = $_POST['time'];
            
            // Validate the requested time (between 6 AM and 7 PM)
            $startTime = strtotime('06:00:00');
            $endTime = strtotime('19:00:00');
            $requestedTimeTimestamp = strtotime($requestedTime);
            
            if ($requestedTimeTimestamp < $startTime || $requestedTimeTimestamp > $endTime) {
                echo "Invalid appointment time. Please select a time between 6 AM and 7 PM.";
            } else {
                // Insert the appointment request into the database
                $userId = $_SESSION['user_id']; 
                $insertQuery = "INSERT INTO appointments (user_id, appointment_date, appointment_time)
                                VALUES ('$userId', '$requestedDate', '$requestedTime')";
                mysqli_query($conn, $insertQuery);
                
                echo "Appointment request submitted successfully!";
            }
        } else {
            echo "Please fill out the date and time fields.";
        }
    }
    ?>
    
    <form action="" method="post">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br><br>
        
        <label for="time">Time (between 6 AM and 7 PM):</label>
        <input type="time" id="time" name="time" required><br><br>
        
        <input type="submit" value="Request Appointment">
    </form>
</body>
</html>
