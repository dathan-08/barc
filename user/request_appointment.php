<?php 
    require 'dashboard.php';
 
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Barc-Appointment</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background:rgba(26, 106, 236, 0.4); 
        }
        
        .containers {
            max-width: 600px;
            margin: auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            margin-bottom: 20px;
        }
        
        label {
            font-weight: bold;
        }
        
        form {
            margin-top: 20px;
        }
        
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
   
    <div class="containers mt-5">
        <h2>Request an Appointment</h2>
        <?php
        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['date']) && isset($_POST['time'])) {
                // ... (rest of your PHP code)
            } else {
                echo '<div class="alert alert-danger">Please fill out the date and time fields.</div>';
            }
        }
        ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="time">Time (between 6 AM and 7 PM):</label>
                <input type="time" id="time" name="time" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Request Appointment</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and jQuery (required for some Bootstrap features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
