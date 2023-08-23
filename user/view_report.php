<?php 
    require 'dashboard.php';
    if (isset($_GET['report_id'])) {
        $reportId = $_GET['report_id'];
    
        // Fetch the report details using the report ID
        $reportQuery = "SELECT r.*, u.*, a.*
                        FROM reports r
                        JOIN users u ON r.user_id = u.user_id
                        JOIN analysis a ON r.report_id = a.report_id
                        WHERE r.report_id = $reportId";
        $reportResult = mysqli_query($conn, $reportQuery);
        $reportData = mysqli_fetch_assoc($reportResult);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barc-Report</title>
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
        .card-subtitle {
            text-align: center;
            text-decoration: underline;
            font-weight: bold;
        }

       
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="report-container">
        <h2 class="report-title">Detailed-Blood Test Report</h2>
        <?php if ($reportData) { ?>
            <div class="report">
                <strong>Report Details</strong><br>
                
                <label>Date:</label> <?php echo $reportData['report_date']; ?><br>
                <label>Time:</label> <?php echo $reportData['report_time']; ?>
        </div>
            <div class="report">
                <strong>Personal Details:</strong><br>
                <label>Name:</label> <?php echo $reportData['username']; ?><br>
      
                <label>Age:</label><?php
                    $dob =  $reportData['date_of_birth'];
                    $dob_timestamp = strtotime($dob); // Convert DOB to a Unix timestamp
                    $current_timestamp = time(); // Current Unix timestamp
                    $age = date("Y") - date("Y", $dob_timestamp); // Calculate the age
                    echo "$age";?><br>
                    <label>Contact:</label>  <label>Time:</label> <?php echo $reportData['contact_number']; ?>
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
                        <td><?php echo $reportData['ldl']; ?></td>
                    </tr>
                    <tr>
                        <td>HDL</td>
                        <td><?php echo $reportData['hdl']; ?></td>
                    </tr>
                    <tr>
                        <td>Triglycerides</td>
                        <td><?php echo $reportData['triglycerides']; ?></td>
                    </tr>
                    <tr>
                        <td>Total Cholesterol</td>
                        <td><?php echo $reportData['total_cholesterol']; ?></td>
                    </tr>
                </table>
            </div>

            <div class="report">
                <strong>HbA1c</strong><br>
                <label>HbA1c:</label> <?php echo $reportData['hba1c']; ?>
            </div>

            
                <div class="report">
                    <strong>Analysis:</strong><br>
                    Cholesterol: <?php echo $reportData['cholesterol']; ?><br>
                    Diabetes: <?php echo $reportData['diabetes']; ?>
                </div>
                <div class="report">
                    <?php
                $analysisQuery = "SELECT cholesterol, diabetes FROM analysis WHERE report_id = $reportId";
                $analysisResult = mysqli_query($conn, $analysisQuery);
                 $analysisData = mysqli_fetch_assoc($analysisResult);

                 // Retrieve cholesterol and diabetes values
                 $cholesterol = $analysisData['cholesterol'];
                $diabetes = $analysisData['diabetes'];

             // Query to retrieve diet details for cholesterol and diabetes conditions
             $diet_query = "SELECT * FROM diet_plans WHERE `conditions` = '$cholesterol' OR `conditions` = '$diabetes'";
            $diet_result = mysqli_query($conn, $diet_query);
            while ($diet = mysqli_fetch_assoc($diet_result)) { ?>
                <strong>Prescribed diet:</strong><br>
                <h6class="card-subtitle mb-2 "><center><b><u><?php echo $diet['conditions']; ?></u></b></center></h6>
                <p class="card-text">Description:<?php echo $diet['description']; ?></p>
                <p class="card-text"> Foods:<?php echo $diet['recommended_foods']; ?></p>
                <p class="card-text">Recommended Exercises:<?php echo $diet['recommended_exercises']; ?></p>
            <?php }
                ?>
            
        </div>
            <?php } else { ?>
                <div class="report text-danger">No analysis available for this report.</div>
            <?php } ?>
        <?php } else { ?>
            <div class="report text-danger">No report available for this user.</div>
        <?php } ?>
    </div>
</div>
</body>
</html>