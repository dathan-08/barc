<!DOCTYPE html>
<html lang="en" >
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <title>BARC</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
  <link rel="stylesheet" href="./style.css">
  <script>
	function validatePassword() {
    var password = document.getElementById("pass").value;
    var confirmPassword = document.getElementById("c_pass").value;
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
<!-- partial:index.partial.html -->
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">LOGIN</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">REGISTER</label>
		
		<div class="login-form">
			<form action="login_process.php" method="post" class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" name="Username" class="input">
				</div>
				<div class="group">
					<?php
					if (isset($_GET['wronguser'])) {
						echo "<font color='red' size='2'>" . htmlspecialchars("Invalid username!!") . "</font><br><br>";
					}
				?>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="password" type="password" name="password" class="input" data-type="password">
				</div>
				<div class="group">
					<?php
					if (isset($_GET['wrongpass'])) {
						echo "<font color='red' size='2'>" . htmlspecialchars("Invalid Password!!") . "</font><br><br>";
					}
				?>
				
				</div>

				<div class="group">
					<input type="submit" class="button" value="LOGIN">
				</div>
			</form>
			<form action="" method="post" onsubmit="return validatePassword()" class="sign-up-htm" >
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" name="username" class="input" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="text" name="password" class="input"  required>

				</div>
				<div class="group">
					<label for="c_pass" class="label">Confirm Password</label>
					<input id="c_pass" type="text" name="c_password"   class="input" required>
					<span id="passwordError" style="color: red;"></span><br>
				</div>
				<div class="group">
					<label for="firstname" class="label">First name</label>
					<input id="firstname" type="text" name="firstname" class="input" required>
				</div>
				<div class="group">
					<label for="lastname" class="label">Last name</label>
					<input id="lastname" type="text" name="lastname" class="input" required>
				</div>
				<div class="group">
					<label for="dob" class="label">Date Of Birth</label>
					<input id="dob" type="date" name="dob" class="input" required>
				</div>
				<div class="group">
				    <label for="gender" class="label">Gender</label><br>
                     <select id="gender" name="gender" required>
                     <option value="male">Male</option>
                     <option value="female">Female</option>
                     <option value="other">Other</option>
                     </select><br>
				  <br>
			    </div>
				<div class="group">
					<label for="cno" class="label">Contact Number</label>
					<input id="cno" type="tel" class="input"name="contactno"  maxlength="10" required>
				</div>
				<div class="group">
					<label for="address" class="label">Address</label>
					<textarea id="address" name="address" rows="4" required></textarea><br>

				</div>

				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="text" name="email" class="input">
				</div>
                <br>
				<br>
				<div class="group">
					
					<input type="submit" class="button" value="REGISTER">

				</div>
				<div class="group">
				<?php
           				if (isset($_GET['userexist'])) 
						{
                			echo "<br><br><font color='red' size='2'>" . htmlspecialchars("User Already Exist") . "</font><br><br>";
           				}
        			?>
				</div>

				<button> back to home</button>
			</form>
		</div>
	    <!-- </form> -->
	</div>
</div>
<!-- partial -->
  
</body>
</html>
