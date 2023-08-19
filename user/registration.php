<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("c_password").value;
            if (password !== confirmPassword) {
                document.getElementById("passwordError").innerHTML = "Passwords do not match.";
                return false;
            }
            var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/;
            
            if (!passwordPattern.test(password)) {
                document.getElementById("passwordError").innerHTML = "Password must be 8-16 characters long and include at least one uppercase letter, one digit, and one special character.";
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>Register</h2>
 
    <form action="" method="POST" onsubmit="return validatePassword()"  >
        <!-- <label for="user_id">User ID:</label> -->
        <!-- <input type="text" id="user_id" name="user_id" required><br><br> -->
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <span id="passwordError" style="color: red;"></span><br>

        <label for="c_password">Password:</label>
        <input type="password" id="c_password" name="c_password" required><br><br>
        
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required><br><br>
        
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required><br><br>
        
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>
        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br><br>
        
        <label for="contactno">Contact Number:</label>
        <input type="tel" id="contactno" name="contactno" required><br><br>
        
        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" required></textarea><br><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br><br>
        
        <input type="submit" value="Register">
        <?php
            if (isset($_GET['userexist'])) {
                echo "<br><br><font color='red' size='2'>" . htmlspecialchars("User Already Exist") . "</font><br><br>";
            }
        ?>
    </form>


</body>
</html>

<?php

require "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $contactno = $_POST["contactno"];
    $address = $_POST["address"];
    $email = $_POST["email"];

    $checkQuery = "SELECT username FROM users WHERE username = '$username' OR email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);
    
    if (mysqli_num_rows($checkResult) > 0) {
        header("location: registration.php?userexist=1");
        
    }
    else{ 
        //Check if required fields are not empty before inserting
        if (!empty($username) && !empty($password) && !empty($firstname) && !empty($lastname) && !empty($dob) && !empty($gender) && !empty($contactno) && !empty($address) && !empty($email)) {
            // Perform database insertion
            $sql = "INSERT INTO users (username, password_hash, first_name, last_name, date_of_birth, gender, contact_number, address, email)
                    VALUES ('$username', '$password', '$firstname', '$lastname', '$dob', '$gender', '$contactno', '$address', '$email')";
                
        }
        header("Location: login.php?success=true");
        exit();
    }  
    
    mysqli_free_result($result);
   
}
mysqli_close($conn);
?>
</body>
</html>
