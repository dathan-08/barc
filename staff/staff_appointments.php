<?php

require "staff_dash.php";
// Query to fetch approved appointments
$approvedAppointmentsQuery = "SELECT * FROM appointments WHERE Status = 'approved'";
$approvedAppointmentsResult = mysqli_query($conn, $approvedAppointmentsQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Staff Approved Appointments</title>
</head>
<body>
    <h1>Approved Appointments</h1>
    
    <table>
        <tr>
            <th>Appointment ID</th>
            <th>User ID</th>
            <th>Requested Date</th>
            <th>Requested Time</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($approvedAppointmentsResult)) { ?>
            <tr>
                <td><?php echo $row['appointment_id']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['appointment_date']; ?></td>
                <td><?php echo $row['appointment_time']; ?></td>
                <td>
                    <a href="generate_report.php?user_id=<?php echo $row['user_id']; ?>&appointment_id=<?php echo $row['appointment_id']; ?>">Generate Report</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
