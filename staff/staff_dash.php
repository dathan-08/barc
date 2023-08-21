<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>
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
            <li><a href="staff_home.php">Home</a></li>
            <li><a href="staff_appointments.php">Appointments</a></li>
            <!-- <li><a href="">Logout</a></li> -->
            <li><div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        profile
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">dummy</a></li>
                        <li><a class="dropdown-item" href="#">edit</a></li>
                        <li><a class="dropdown-item" href="logout.php">logout</a></li>
                    </ul>
                    </div>
</li>
        </ul>
    </nav>

  
    </main>

</body>
</html>
