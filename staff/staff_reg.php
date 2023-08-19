<!DOCTYPE html>
<html>
<head>
    <title>Staff Registration Page</title>
</head>
<body>
    <h2>Staff Registration</h2>
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

    <?php
        require "config.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form datat
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]); 
        $firstName = mysqli_real_escape_string($conn, $_POST["first_name"]);
        $lastName = mysqli_real_escape_string($conn, $_POST["last_name"]);
        $contactNumber = mysqli_real_escape_string($conn, $_POST["contact_number"]);

        // Your database connection code here

        // Insert the data into the database
        $query = "INSERT INTO staff (username, password_hash, first_name, last_name, contact_number) 
                  VALUES ('$username', '$password', '$firstName', '$lastName', '$contactNumber')";

        if (mysqli_query($conn, $query)) {
            echo "";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        header("Location: staff_login.php?success=true");
        exit();

        // Close the database connection
        mysqli_close($conn);
    }
    ?>

    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>
        
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>
        
        <label for="contact_number">Contact Number:</label>
        <input type="tel" id="contact_number" name="contact_number" required><br><br>
        
        <input type="submit" value="Register"><br><br>
        <a href="staff_reg.php">New Registration</a>
    </form>
</body>
</html>
