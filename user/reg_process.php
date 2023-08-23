<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define an array to store missing field names
    $missingFields = array();

    // Check if each field is set in the POST data
    $requiredFields = array("firstname", "lastname", "dob", "gender", "contact", "address", "username", "password");

    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            // If the field is missing or empty, add it to the missingFields array
            $missingFields[] = $field;
        }
    }

    // If there are missing fields, display an error message
    if (!empty($missingFields)) {
        echo "The following required fields are missing: " . implode(", ", $missingFields);
    } else {
        // All required fields are present, continue with form processing

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $contact = $_POST["contact"];
        $address = $_POST["address"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Check if username already exists
        $checkUsernameQuery = "SELECT username FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $checkUsernameQuery);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "Username already exists. Please choose a different username.";
        } else {
            // Insert user data into the database using prepared statements
            $insertQuery = "INSERT INTO users (first_name, last_name, username, password, date_of_birth, gender, contact_number, address) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $insertQuery);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ssssssss", $firstname, $lastname, $username, $password, $dob, $gender, $contact, $address);
                mysqli_stmt_execute($stmt);
                echo "Registration successful!";
                header("Location: index.php?success=true");
                exit();
            } else {
                header("Location: index.php?error=1");
                exit();
            }
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
