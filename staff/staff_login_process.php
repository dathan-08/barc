<?php
require 'config.php';
if (!empty($_POST)) {
    $username = mysqli_real_escape_string($conn, $_POST["Username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    
    // Check user credentials using a query with prepared statement
    $query = "SELECT * FROM staff WHERE username = '$username'";
    $result = mysqli_query($conn, $query) or die("Query failed");

    if ($row = mysqli_fetch_assoc($result)) {
        if ($password === $row['password_hash']) { // Use === for strict comparison
            $_SESSION['Username'] = $row['username'];
            $_SESSION['is_admin'] = $row['is_admin'];
            if ($row['is_admin'] == 1) {
                header("Location: ../admin/admin_home.php"); // This goes up one directory and then into the 'admin' folder

            } else {
                header("location: staff_home.php");
            }
            exit();
        } else {
            header("location: staff_index.php?wrongpass=1");
            exit();
        }
    } else {    
        header("location: staff_index.php?wronguser=1");
        exit();
    }
} else {
    // Redirect to the login page or handle authentication as needed
    header("Location: staff_login_process.php");
    exit();
}
mysqli_close($conn);
?>

