<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Your existing styles here */
    </style>    <style>
/* Reset some default styles */
body, h1, h2, h3, p, ul, li {
    margin: 0;
    padding: 0;
}

/* Apply a background color and text color to the body */
body {
    background-color: #f0f0f0;
    color: #333;
    font-family: Arial, sans-serif;
}

/* Style the header */
header {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

/* Style the navigation menu */
nav ul {
    list-style: none;
    display: flex;
    justify-content: center;
    background-color: #333;
    padding: 10px 0;
}

nav ul li {
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

/* Style the main content section */
main {
    padding: 20px;
}

.dashboard {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.field {
    background-color: #f9f9f9;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.field h3 {
    font-size: 18px;
    margin-bottom: 10px;
}

/* Style the footer */
footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    position: absolute;
    bottom: 0;
    width: 100%;
}
    </style>
</head>
<body>

<?php
// Start a new session or resume the current session
require 'config.php';

// Check if the user is logged in (you should implement your login logic)
if (isset($_SESSION['Username'])) {
    $username = $_SESSION['Username'];
} else {
    // Redirect to the login page or handle authentication as needed
    header("Location: login.php");
    exit();
}
?>

    <header>
        <h1>Welcome, <?php echo $username; ?></h1>   
     </header>

<nav>
    <ul>
        <li><a href="staff_home.php"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="staff_appointments.php"><i class="fas fa-calendar"></i> Appointments</a></li>
        <li><a href="report.php"><i class="fas fa-chart-bar"></i> Report</a></li>
        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        <!-- <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li> -->
    </ul>
</nav>


  
    </main>

</body>
</html>
