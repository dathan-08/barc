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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .reports-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .report {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }

        .report-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .report-data {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .analysis {
            font-size: 16px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="reports-container">
        <h1>Generated Reports</h1>
        <?php while ($row = mysqli_fetch_assoc($reportsResult)) { ?>
            <div class="report">
                <div class="report-title">Report ID: <?php echo $row['report_id']; ?></div>
                <div class="report-data">
                    <strong>LDL:</strong> <?php echo $row['ldl']; ?><br>
                    <strong>HDL:</strong> <?php echo $row['hdl']; ?><br>
                    <strong>Triglycerides:</strong> <?php echo $row['triglycerides']; ?><br>
                    <strong>HbA1c:</strong> <?php echo $row['hba1c']; ?>
                </div>
                <?php if ($row['cholesterol'] && $row['diabetes']) { ?>
                    <div class="analysis">
                        <strong>Analysis:</strong><br>
                        Cholesterol: <?php echo $row['cholesterol']; ?><br>
                        Diabetes: <?php echo $row['diabetes']; ?>
                    </div>
                <?php } ?>
                
            </div>
        <?php } ?>
    </div>
</body>
</html>