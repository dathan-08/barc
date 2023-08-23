<?php
require 'dashboard.php';


// Fetch the logged-in user's ID
$username = $_SESSION['name'];
$user_id = $_SESSION['user_id'];

// Get all reports for the user
$reportsQuery = "SELECT r.*, a.cholesterol, a.diabetes
                 FROM reports r
                 LEFT JOIN analysis a ON r.report_id = a.report_id
                 WHERE r.user_id = $user_id
                 ORDER BY r.report_id DESC";
$reportsResult = mysqli_query($conn, $reportsQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Generated Reports</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background:rgba(26, 106, 236, 0.4); 
            margin: 0;
            padding: 0;
        }

        .reports-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .report {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }

        .report-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
            color: #007bff;
        }

        .report-data {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .analysis {
            font-size: 18px;
            margin-top: 10px;
            text-align: center;
        }

        #head {
            text-align: center;
            padding-bottom: 20px;
            font-size: 32px;
            font-weight: bold;
            color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="reports-container">
        <h1 id="head">Blood Test Reports</h1>
        <?php if (mysqli_num_rows($reportsResult) > 0) { ?>
            <table>
                <tr>
                    <th>Report Date</th>
                    <th>Report Time</th>
                    <th>Total Cholesterol</th>
                    <th>HbA1c</th>
                    <th>Analysis</th>
                    <th>Detailed report</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($reportsResult)) { ?>
                    <tr>
                        <td><?php echo $row['report_date']; ?></td>
                        <td><?php echo $row['report_time']; ?></td>
                        <td><?php echo $row['total_cholesterol']; ?></td>
                        <td><?php echo $row['hba1c']; ?></td>
                        <td>
                            <?php if ($row['cholesterol'] && $row['diabetes']) { ?>
                                <strong>Cholesterol:</strong> <?php echo $row['cholesterol']; ?><br>
                                <strong>Diabetes:</strong> <?php echo $row['diabetes']; ?>
                              <td>  <a href="view_report.php?report_id=<?php echo $row['report_id']; ?>">View Full Report</a></td>
                            <?php } else { ?>
                                <p>No analysis available</p>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p class="text-center">No reports available for this user.</p>
        <?php } ?>
    </div>

    <!-- Include Bootstrap JS and jQuery (required for some Bootstrap features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
