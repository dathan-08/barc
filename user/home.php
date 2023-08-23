<?php require 'dashboard.php';?>

<?php


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
    <title>Barc-home</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Optional: Include your custom CSS here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background:rgba(26, 106, 236, 0.4); 
        }

        .report-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
           
            border-radius: 10px;
           
            text-align: center;
        }

        .report-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            text-decoration: underline;
            color: #1f2c3e;
        }

        .data-table {
            font-size: 18px;
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .data-table th, .data-table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        .data-table th {
            background-color: #f2f2f2;
        }

        .report {
            font-size: 18px;
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            text-align: left;
            color: #1f2c3e;
        }

        a {
            color: white;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="report-container">
        <h2 class="report-title">Blood Test Report</h2>
        <?php if ($latestReport) { ?>
            <div class="report">
                <strong>Personal Details:</strong><br>
                <label>NAME:</label> <?php if (isset($_SESSION['name'])) {
                        $username = $_SESSION['name'];
                    $getUserQuery = "SELECT first_name, last_name FROM users WHERE username = '$username'";
                    $getUserResult = mysqli_query($conn, $getUserQuery);
      
                        if ($userRow = mysqli_fetch_assoc($getUserResult)) {
                    $fullName = $userRow['first_name'] . " " . $userRow['last_name'];
                    echo "$fullName";
                     } }?><br>
                <label>AGE:</label><?php if (isset($_SESSION['name'])) {
                        $username = $_SESSION['name'];
                    $getUserQuery = "SELECT date_of_birth FROM users WHERE username = '$username'";
                    $getUserResult = mysqli_query($conn, $getUserQuery);
      
                        if ($ageRow = mysqli_fetch_assoc($getUserResult)) {
                    $dob = $ageRow['date_of_birth'];
                    $dob_timestamp = strtotime($dob); // Convert DOB to a Unix timestamp
                    $current_timestamp = time(); // Current Unix timestamp
                    $age = date("Y") - date("Y", $dob_timestamp); // Calculate the age
                    echo "$age";} }?><br>
                    <label>Contact:</label> <?php if (isset($_SESSION['name'])) {
                        $username = $_SESSION['name'];
                    $getUserQuery = "SELECT contact_number FROM users WHERE username = '$username'";
                    $getUserResult = mysqli_query($conn, $getUserQuery);
      
                        if ($userRow = mysqli_fetch_assoc($getUserResult)) {
                    $contact_number = $userRow['contact_number'] ;
                    echo "$contact_number";
                     } }?>
            </div>
            <div class="report">
                <strong>DATE AND TIME</strong><br>
                <label>Date:</label> <?php echo $latestReport['report_date']; ?><br>
                <label>Time:</label> <?php echo $latestReport['report_time']; ?>
            </div>

            <div class="report">
                <strong>Lipid Test</strong><br>
                <table class="data-table">
                    <tr>
                        <th>Test</th>
                        <th>Result</th>
                    </tr>
                    <tr>
                        <td>LDL</td>
                        <td><?php echo $latestReport['ldl']; ?></td>
                    </tr>
                    <tr>
                        <td>HDL</td>
                        <td><?php echo $latestReport['hdl']; ?></td>
                    </tr>
                    <tr>
                        <td>Triglycerides</td>
                        <td><?php echo $latestReport['triglycerides']; ?></td>
                    </tr>
                    <tr>
                        <td>Total Cholesterol</td>
                        <td><?php echo $latestReport['total_cholesterol']; ?></td>
                    </tr>
                </table>
            </div>

            <div class="report">
                <strong>HbA1c</strong><br>
                <label>HbA1c:</label> <?php echo $latestReport['hba1c']; ?>
            </div>

            <?php if ($analysisData) { ?>
                <div class="report">
                    <strong>Analysis:</strong><br>
                    Cholesterol: <?php echo $analysisData['cholesterol']; ?><br>
                    Diabetes: <?php echo $analysisData['diabetes']; ?>
                </div>
            <?php } else { ?>
                <div class="report text-danger">No analysis available for this report.</div>
            <?php } ?>
        <?php } else { ?>
            <div class="report text-danger">No report available for this user.</div>
        <?php } ?>
    </div>
</div>
<div id="appointment">
    <center><br><br>
        <button class="btn btn-primary"><a href="request_appointment.php">Book Appointment</a></button><br><br>
    </center>
</div>

<!-- Include Bootstrap JS and jQuery (required for some Bootstrap features) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
                




















