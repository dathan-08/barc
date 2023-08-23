<?php
require 'dashboard.php';

$user_id = $_SESSION['user_id'];

// Query to retrieve the latest report for the logged-in user
$latest_report_query = "SELECT * FROM reports WHERE user_id = $user_id ORDER BY report_id DESC LIMIT 1";
$latest_report_result = mysqli_query($conn, $latest_report_query);
$latest_report = mysqli_fetch_assoc($latest_report_result);

if ($latest_report) {
    $report_id = $latest_report['report_id'];

    // Query to retrieve cholesterol and diabetes analysis
    $analysisQuery = "SELECT cholesterol, diabetes FROM analysis WHERE report_id = $report_id";
    $analysisResult = mysqli_query($conn, $analysisQuery);
    $analysisData = mysqli_fetch_assoc($analysisResult);

    // Retrieve cholesterol and diabetes values
    $cholesterol = $analysisData['cholesterol'];
    $diabetes = $analysisData['diabetes'];

    // Query to retrieve diet details for cholesterol and diabetes conditions
    $diet_query = "SELECT * FROM diet_plans WHERE `conditions` = '$cholesterol' OR `conditions` = '$diabetes'";
    $diet_result = mysqli_query($conn, $diet_query);
}

// Display the data using Bootstrap styling
?>
<!DOCTYPE html>
<html>
<head>
    <title>Barc-Your Health Report</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background:rgba(26, 106, 236, 0.4); 
            background-position: cover;
        }

        .containers {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
             background-color: #f9f9f9;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            border: outset;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .card {
            margin-top: 20px;
            border: inset;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
           
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #007bff;
        }

        .card-subtitle {
            font-size: 16px;
            color: #555;
        }

        .card-text {
            font-size: 14px;
            margin-top: 10px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="containers mt-4">
        <h1>Your Health Report</h1>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Recommended Diet</h5>
                <?php while ($diet = mysqli_fetch_assoc($diet_result)) { ?>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $diet['conditions']; ?></h6>
                    <p class="card-text"><strong>Description:</strong> <?php echo $diet['description']; ?></p>
                    <p class="card-text"><strong>Recommended Foods:</strong> <?php echo $diet['recommended_foods']; ?></p>
                    <p class="card-text"><strong>Recommended Exercises:</strong> <?php echo $diet['recommended_exercises']; ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php
mysqli_close($conn);
?>
