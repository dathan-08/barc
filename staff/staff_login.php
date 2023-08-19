<!DOCTYPE html>
<html>
<head>
    <title>Staff Login Page</title>
</head>
<body>
    <h2>Staff Login</h2>

    <?php
    require 'config.php' ;

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        // Check user credentials using a query with prepared statement
        $query = "SELECT * FROM staff WHERE username = '$username' AND password_hash = '$password'";
        $result = mysqli_query($conn, $query) or die("Query Failed");

        if ($row = mysqli_fetch_assoc($result)) {
            if ($password === $row['password_hash']) {
                $_SESSION['name'] = $row['username'];
                header("location: home.php");
                exit();
            } else {
                header("location: staff_login.php?wrongpass=1");
                exit();
            }
        } else {
            header("location: staff_login.php?wronguser=1");
            exit();
        }

        mysqli_free_result($result);
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login"><br><br>
    </form>
</body>
</html>
