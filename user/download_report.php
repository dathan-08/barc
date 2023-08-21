<?php
require 'config.php';

if (!isset($_GET['report_id'])) {
    header("Location: user_reports.php");
    exit();
}

$report_id = $_GET['report_id'];

// Fetch the report and analysis data
$reportQuery = "SELECT * FROM reports WHERE report_id = $report_id";
$analysisQuery = "SELECT cholesterol, diabetes FROM analysis WHERE report_id = $report_id";

$reportResult = mysqli_query($conn, $reportQuery);
$analysisResult = mysqli_query($conn, $analysisQuery);

$reportData = mysqli_fetch_assoc($reportResult);
$analysisData = mysqli_fetch_assoc($analysisResult);

if (!$reportData || !$analysisData) {
    header("Location: user_reports.php");
    exit();
}

$fileName = "report_" . $report_id . ".csv";

// Create and download the CSV file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $fileName . '"');

$output = fopen('php://output', 'w');
fputcsv($output, array('User ID', 'Appointment Date', 'Appointment Time', 'HDL', 'LDL', 'Triglycerides', 'HbA1c', 'Total Cholesterol', 'Cholesterol Analysis', 'Diabetes Analysis'));

fputcsv($output, array($reportData['user_id'], $reportData['appointment_date'], $reportData['appointment_time'], $reportData['hdl'], $reportData['ldl'], $reportData['triglycerides'], $reportData['hba1c'], $reportData['total_cholesterol'], $analysisData['cholesterol'], $analysisData['diabetes']));

fclose($output);
?>
