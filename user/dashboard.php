<?php require "config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: transparent;

            margin: 30px;
        }

        .navbar-brand {
            font-size: 90px;
            font-weight: bold;
            color: black;
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-toggler-icon {
            background-color: black;
        }

        .navbar-nav .nav-link {
            font-size: 18px;
            color: black;
            transition: red 0.2 s;
        }

        .navbar-nav .nav-link:hover {
            color: #17a2b8;
        }

        .navbar-dark .navbar-toggler {
            border: none;
        }

        .navbar-dark .navbar-toggler:focus {
            outline: none;
        }
        #navbarNav{
            margin-left: 50%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="home.php">BARC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="request_appointment.php">Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reports.php">Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="diet.php">Diet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
