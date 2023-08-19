<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>

<body>
    <h2>Login</h2>
    
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <?php
            if (isset($_GET['wronguser'])) {
                echo "<font color='red' size='2'>" . htmlspecialchars("Invalid username!!") . "</font><br><br>";
            }
        ?>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <?php
            if (isset($_GET['wrongpass'])) {
                echo "<font color='red' size='2'>" . htmlspecialchars("Invalid Password!!") . "</font><br><br>";
            }
        ?>
        
        <input type="submit" value="Login"><br><br>
        <a href="registration.php">New Registration</a>
    </form>

    <?php
// session_start();

require 'config.php';

if (!empty($_POST)) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Check user credentials using a query with prepared statement
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query) or die("Query failed");

    if ($row = mysqli_fetch_assoc($result)) {
        if ($password === $row['password_hash']) {
            $_SESSION['name'] = $row['username'];
            header("location: home.php");
            exit();
        } else {
            header("location: login.php?wrongpass=1");
            exit();
        }
    } else {
        header("location: login.php?wronguser=1");
        exit();
    }

    mysqli_free_result($result);
}

mysqli_close($conn);
?>

</body>
</html>
