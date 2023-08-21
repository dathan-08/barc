<?php
require 'admin_dash.php';

$pendingAppointmentsQuery = "SELECT * FROM appointments WHERE Status = 'pending'";
$pendingAppointmentsResult = mysqli_query($conn, $pendingAppointmentsQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Pending Appointments</h1>
    
    <table>
        <tr>
            <th>Appointment ID</th>
            <th>User ID</th>
            <th>Requested Date</th>
            <th>Requested Time</th>
            <th>Action</th>   
        </tr>
        <?php while ($row = mysqli_fetch_assoc($pendingAppointmentsResult)) { ?>
            <tr>
                <td><?php echo $row['appointment_id']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['appointment_date']; ?></td>
                <td><?php echo $row['appointment_time']; ?></td>
                <td>
                    <form action="approve_appointment.php" method="post">
                        <input type="hidden" name="appointment_id" value="<?php echo $row['appointment_id']; ?>">
                        <button type="submit">Approve</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
