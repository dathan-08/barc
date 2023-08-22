<!DOCTYPE html>
<html>
<head>
    <title>Stylish Navbar Example</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 60px;
            background: url("u_home.jpg");
            background-size: cover;
        }

        #content {
            margin-left: 50%;
        }
        .navbar{
           
            margin:20px; 
            height:75px;
            color:black;
            padding: 10px;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, .1),
                    -10px -10px 10px rgba(255, 255, 255, 1),
                    inset 10px 10px 10px  rgba(0, 0, 0, .1),
                    inset -10px -10px 10px rgba(255, 255, 255, 1);
        border-radius: 10px;
        } 
        .
        /* Style for the navigation links */
        .navbar-dark .navbar-nav .nav-link {
            color: black;
        }
        .navbar:hover
        {
            color:blue;

        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-strong sticky-top" >
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Navbar brand -->
        <?php
        require 'config.php';
        if (isset($_SESSION['name'])) {
            $username = $_SESSION['name'];
            $getUserQuery = "SELECT first_name, last_name FROM users WHERE username = '$username'";
            $getUserResult = mysqli_query($conn, $getUserQuery);
            if ($userRow = mysqli_fetch_assoc($getUserResult)) {
                $fullName = $userRow['first_name'] . " " . $userRow['last_name'];
                echo "<h2 class='dashboard-logo text-center mb-4'>$fullName</h2>";
            }
        }
        ?>

        <div class="collapse navbar-collapse " id="content">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <button class="nav-link" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <button class="nav-link" href="request_appointment.php">Appointments</a>
                </li>
                <li class="nav-item">
                    <button class="nav-link" href="reports.php">Report</a>
                </li>
                <li class="nav-item">
                    <button class="nav-link" href="diet.php">Diet</a>
                </li>
                <li class="nav-item">
                    <button class="nav-link" href="logout.php">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
