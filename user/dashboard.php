<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Example</title>
    <style>
        /* Basic CSS styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .dashboard {
            margin:10px;
            background-color: white;
            color: #fff;
            padding: 10px;
            padding-left: 30px;
            padding-right: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border:2px inset darkblue;
        }
        .dashboard-logo {
            font-size: 24px;
            font-weight: bold;
            color:black;
        }
        .dashboard-links {
            list-style: none;
            margin: 20px;
            padding:10px;
            display: flex;
        }
        .dashboard-link {
            margin-right: 20px;
            color: red;
            text-decoration: none;
        }
        .dashboard-link:last-child {
            margin-right: 0;
        }
        .dropdown {
            position: relative;
            display: inline-block;
            width: 30px;
        }
        .dropdown-content {
            display: none;
            padding:5px;
            
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
            
        }
        .i{
            padding:15px;
            
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="dashboard-logo">
            <?php
  
  require 'config.php';
  
  if (isset($_SESSION['name'])) {
      $username = $_SESSION['name'];
      $getUserQuery = "SELECT first_name, last_name FROM users WHERE username = '$username'";
      $getUserResult = mysqli_query($conn, $getUserQuery);
      
      if ($userRow = mysqli_fetch_assoc($getUserResult)) {
          $fullName = $userRow['first_name'] . " " . $userRow['last_name'];
          echo "$fullName</div>";
      }
      ?>
        <ul class="dashboard-links">
    <?php
      echo '<div class=i><i><a href="home.php">Home</a></i></div>';
      echo '<div class=i><i><a href="request_appointment.php">Appointments</a></i></div>';
      echo '<div class=i><i><a href="reports.php">Report</a></i></div>';
      echo '<div class=i><i><a href="diet.php">Diet</a></i></div>';
      echo '<div class=i><i><div class="dropdown">
      <button class="dropbtn">Profile</button>
            <div class="dropdown-content">
          <a href="#">Edit Profile</a><br>
          <a href="logout.php">Log Out</a>
        </div>
        </div></i></div>';

  } else {
      echo '<header><h1>Welcome to Your Dashboard</h1></header>';
  }
  ?>
        </ul>
    </div>
    <!-- Rest of your page content -->
</body>
</html>


