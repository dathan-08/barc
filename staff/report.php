<?php
require 'staff_dash.php';

// Get all reports for the user
$reportsQuery = "SELECT r.*, u.*, a.*
FROM reports r
JOIN users u ON r.user_id = u.user_id
JOIN analysis a ON r.report_id = a.report_id;";
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
            
            <?php while ($row = $reportsResult->fetch_assoc()) {?>
                <div class="report">
               <?php $dob = $row['date_of_birth'];
                $dob_timestamp = strtotime($dob); // Convert DOB to a Unix timestamp
                $current_timestamp = time(); // Current Unix timestamp
                $age = date("Y") - date("Y", $dob_timestamp); // Calculate the age?>
                <div class="report-title">Name: <?php echo $row['first_name'] . " " . $row['last_name']; ?></div>
                <div class="report-title">Age: <?php echo $age; ?></div>
                <div class="report-data">Report ID: <?php echo $row['report_id']; ?></div>
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