<?php
require 'config.php';

if (!empty($_POST)) {
    $username = mysqli_real_escape_string($conn, $_POST["Username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Check user credentials using a query with prepared statement
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query) or die("Query failed");

    if ($row = mysqli_fetch_assoc($result)) {
        if ($password === $row['password_hash']) { // Use === for strict comparison
            $_SESSION['name'] = $row['username'];
            $_SESSION['user_id']=$row['user_id'];
            header("location: home.php");
            exit();
        } else {
            header("location: index.php?wrongpass=1");
            exit();
        }
    } else {    
        header("location: index.php?wronguser=1");
        exit();
    }

    mysqli_free_result($result);
}

mysqli_close($conn);
?>
