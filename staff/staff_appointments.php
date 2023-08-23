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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
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

