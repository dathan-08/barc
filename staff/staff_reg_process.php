<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $contactno = $_POST["contactno"];
    
    // Check if username already exists
    $checkUsernameQuery = "SELECT username FROM staff WHERE username = ?";
    
    $stmt = mysqli_prepare($conn, $checkUsernameQuery);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    
    if (mysqli_stmt_num_rows($stmt) > 0) {
        header("Location: registration.php?userexist=1");
        exit();
    } 

    // Insert new user data
    // Use prepared statement to prevent SQL injection
    $insertQuery = "INSERT INTO staff (username, password_hash, first_name, last_name, contact_number)
                    VALUES (?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($stmt, "sssss", $username, $password, $firstname, $lastname, $contactno);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header("Location: index.html"); // Redirect to login page after successful registration
        exit();
    } else {
        header("Location: index.html"); // Redirect to registration page in case of failure
        exit();
    }
}

mysqli_close($conn);
?>
