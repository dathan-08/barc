<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

require 'dashboard.php';



// Fetch the logged-in user's ID
$username = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
// Get the latest report for the user
$latestReportQuery = "SELECT * FROM reports WHERE user_id = $user_id ORDER BY report_id DESC LIMIT 1";
$latestReportResult = mysqli_query($conn, $latestReportQuery);
$latestReport = mysqli_fetch_assoc($latestReportResult);

if ($latestReport) {
    // Get the analysis data for the specific report
    $report_id = $latestReport['report_id'];
    $analysisQuery = "SELECT cholesterol, diabetes FROM analysis WHERE report_id = $report_id";
    $analysisResult = mysqli_query($conn, $analysisQuery);
    $analysisData = mysqli_fetch_assoc($analysisResult);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Generated Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .report-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .report-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .report-data {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .analysis {
            font-size: 18px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="report-container">
        <div class="report-title">Latest Generated Report</div>
        <?php if ($latestReport) { ?>
            <div class="report-data">
                <strong>Report ID:</strong> <?php echo $latestReport['report_id']; ?><br>
                <strong>User ID:</strong> <?php echo $latestReport['user_id']; ?><br>
                <strong>LDL:</strong> <?php echo $latestReport['ldl']; ?><br>
                <strong>HDL:</strong> <?php echo $latestReport['hdl']; ?><br>
                <strong>Triglycerides:</strong> <?php echo $latestReport['triglycerides']; ?><br>
                <strong>HbA1c:</strong> <?php echo $latestReport['hba1c']; ?>
            </div>
            <?php if ($analysisData) { ?>
                <div class="analysis">
                    <strong>Analysis:</strong><br>
                    <?php echo $analysisData['cholesterol']; ?><br>
                    <?php echo $analysisData['diabetes']; ?>
                </div>
            <?php } else { ?>
                <div>No analysis available for this report.</div>
            <?php } ?>
        <?php } else { ?>
            <div>No report available for this user.</div>
        <?php } ?>
    </div>
</body>
</html>

</body>
</html>