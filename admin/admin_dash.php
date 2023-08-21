<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <style>
        /* Basic CSS styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        nav {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 20px;
        }

       
        /* Additional CSS styles as needed */
    </style>
</head>
<body>
    <header>
    <?php
        require 'config.php';
  
  if (isset($_SESSION['Username'])) {
      $username = $_SESSION['Username'];
      $getUserQuery = "SELECT first_name, last_name FROM staff WHERE username = '$username'";
      $getUserResult = mysqli_query($conn, $getUserQuery);
      
      if ($userRow = mysqli_fetch_assoc($getUserResult)) {
          $fullName = $userRow['first_name'] . " " . $userRow['last_name'];
          echo "<header><h1>Welcome $fullName</h1></header>";
      }
    }else {
        echo '<header><h1>Welcome to Your Dashboard</h1></header>';
    }
      ?>
    </header>
    <nav>
        <a href="admin_home.php">Home</a>
        <a href="users.php">Users</a>
        <a href=pending_appointment.php>appointments</a>
        <a href="staffs.php">Staff</a>
        <a href="logout.php">Logout</a>
    </nav>
   
    
</body>
</html>
