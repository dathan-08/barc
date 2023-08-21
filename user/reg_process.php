<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $contactno = $_POST["contactno"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    // Check if username or email already exists
    $checkUsernameQuery = "SELECT username FROM users WHERE username = '$username'";
    $checkEmailQuery = "SELECT email FROM users WHERE email = '$email'";
    
    $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkUsernameResult) > 0) {
        header("Location: registration.php?userexist=1");
        exit();
    } elseif (mysqli_num_rows($checkEmailResult) > 0) {
        header("Location: registration.php?emailexist=1");
        exit();
    }

    // Insert new user data
    // Use prepared statement to prevent SQL injection
    $insertQuery = "INSERT INTO users (username, password_hash, first_name, last_name, date_of_birth, gender, contact_number, address, email)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($stmt, "sssssssss", $username, $password, $firstname, $lastname, $dob, $gender, $contactno, $address, $email);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header("Location: index.php?success=true");
        exit();
    } else {
        header("Location: index.php?error=1");
        exit();
    }
}
mysqli_close($conn);
?>



