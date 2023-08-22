<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="boxicons/css/boxicons.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title> | Login & Registration</title>
<style>
    /* POPPINS FONT */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

*{  
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    background: url("image.jpeg");
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    overflow: hidden;
}
.wrapper{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 110vh;
    background: rgba(26, 106, 236, 0.4);
}
.nav{
    position: fixed;
    top: 0;
    display: flex;
    justify-content: space-around;
    width: 100%;
    height: 100px;
    line-height: 100px;
    background: linear-gradient(rgba(83, 67, 225, 0.6), transparent);
    z-index: 100;
}
.nav-logo p{
    color: white;
    font-size: 25px;
    font-weight: 600;
}
.nav-menu ul{
    display: flex;
}
.nav-menu ul li{
    list-style-type: none;
}
.nav-menu ul li .link{
    text-decoration: none;
    font-weight: 500;
    color: #fff;
    padding-bottom: 15px;
    margin: 0 25px;
}
.link:hover, .active{
    border-bottom: 2px solid #fff;
}
.nav-button .btn{
    width: 130px;
    height: 40px;
    font-weight: 500;
    background: rgba(255, 255, 255, 0.4);
    border: none;
    border-radius: 30px;
    cursor: pointer;
    transition: .3s ease;
}
.btn:hover{
    background: rgba(255, 255, 255, 0.3);
}
#registerBtn{
    margin-left: 15px;
}
.btn.white-btn{
    background: rgba(255, 255, 255, 0.7);
}
.btn.btn.white-btn:hover{
    background: rgba(255, 255, 255, 0.5);
}
.nav-menu-btn{
    display: none;
}
.form-box{
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 512px;
    height: 1700px;
    overflow: hidden;
    z-index: 2;
}
.login-container{
    position: absolute;
    left: 4px;
    width: 500px;
    height: 1700px;
    display: flex;
    flex-direction: column;
    transition: .5s ease-in-out;
}
.register-container{
    margin-top: 80%;
    position: absolute;
    right: -520px;
    height: 2100px;
    width: 500px;
    display: flex;
    flex-direction: column;
    transition: .5s ease-in-out;
}
.top span{
    color: #fff;
    font-size: small;
    padding: 36px 0;
    display: flex;
    justify-content: center;
}
.top span a{
    font-weight: 500;
    color: #fff;
    margin-left: 5px;
}
header{
    color: #fff;
    font-size: 30px;
    text-align: center;
    padding: 10px 0 30px 0;
}
.two-foms{
    display: flex;
    gap: 10px;
}
.two-form{
    display: flex;
    gap: 10px;
}

.three-forms{
    display: flex;
    gap: 10px;
}
.input-field{
    font-size: 15px;
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
    height: 50px;
    width: 100%;
    padding: 0 10px 0 45px;
    border: none;
    border-radius: 30px;
    outline: none;
    transition: .2s ease;
}
.input-field:hover, .input-field:focus{
    background: rgba(255, 255, 255, 0.25);
}
::-webkit-input-placeholder{
    color: #fff;
}
.input-box i{
    position: relative;
    top: -35px;
    left: 17px;
    color: #fff;
}
.submit{
    font-size: 15px;
    font-weight: 500;
    color: black;
    height: 45px;
    width: 100%;
    border: none;
    border-radius: 30px;
    outline: none;
    background: rgba(255, 255, 255, 0.7);
    cursor: pointer;
    transition: .3s ease-in-out;
}
.submit:hover{
    background: rgba(255, 255, 255, 0.5);
    box-shadow: 1px 5px 7px 1px rgba(0, 0, 0, 0.2);
}
.two-col{
    display: flex;
    justify-content: space-between;
    color: #fff;
    font-size: small;
    margin-top: 10px;
}
.two-col .one{
    display: flex;
    gap: 5px;
}
.two label a{
    text-decoration: none;
    color: #fff;
}
.two label a:hover{
    text-decoration: underline;
}
@media only screen and (max-width: 786px){
    .nav-button{
        display: none;
    }
    .nav-menu.responsive{
        top: 100px;
    }
    .nav-menu{
        position: absolute;
        top: -800px;
        display: flex;
        justify-content: center;
        background: rgba(255, 255, 255, 0.2);
        width: 100%;
        height: 90vh;
        backdrop-filter: blur(20px);
        transition: .3s;
    }
    .nav-menu ul{
        flex-direction: column;
        text-align: center;
    }
    .nav-menu-btn{
        display: block;
    }
    .nav-menu-btn i{
        font-size: 25px;
        color: #fff;
        padding: 10px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        cursor: pointer;
        transition: .3s;
    }
    .nav-menu-btn i:hover{
        background: rgba(255, 255, 255, 0.15);
    }
}
@media only screen and (max-width: 540px) {
    .wrapper{
        min-height: 100vh;
    }
    .form-box{
        width: 100%;
        height: 500px;
    }
    .register-container, .login-container{
        width: 100%;
        padding: 0 20px;
    }
    .register-container .two-forms{
        flex-direction: column;
        gap: 0;
    }
}
#reg{
    padding: 2px;
   width: 170px; 
   text-size-adjust: 20px;
}
</style>

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
 <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>BARC .</p>
        </div>
        
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()">Login</button>
            <button class="btn" id="registerBtn" onclick="register()">Register</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>

<!----------------------------- Form box ----------------------------------->    
    <div class="form-box">
        
        <!------------------- login form -------------------------->

        <div class="login-container" id="login">
            <div class="top">
                <span>                                                


                </span>
                <header>Login</header>
            </div>
            <form action="login_process.php" method="post">
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Username" name="Username" id="username">
                <i class="bx bx-user"></i>
                <?php
					if (isset($_GET['wronguser'])) {
						echo "<font color='red' size='2'>" . htmlspecialchars("Invalid username!!") . "</font><br><br>";
					}
				?>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="Password" name="Password" id="password">
                <i class="bx bx-lock-alt"></i>
                <?php
					if (isset($_GET['wrongpass'])) {
						echo "<font color='red' size='2'>" . htmlspecialchars("Invalid Password!!") . "</font><br><br>";
					}
				?>
            </div>
            <div class="input-box">
                <input type="submit" class="submit" value="Sign In">
            </div>
           </form>
        </div>

        <!------------------- registration form -------------------------->
        <div class="register-container" id="register">
            <div class="top">
                <span>                                         </span>
                <header>Register</header>
            </div>
            <div class="two-foms">
                <form action="reg_process.php" onsubmit="return validatePassword()" method="post" >
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Firstname" id="firstname" name="firstname">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Lastname" id="lastname" name="lastname">
                    <i class="bx bx-user"></i>
                </div>
            </div>
            <div class="three-forms">
                <div class="input-box">
                    <input type="date" class="input-field" placeholder="Date of Birth" id="dob" name="dob">
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Gender" id="gender" name="gender">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="tel" class="input-field" placeholder="Contact no" maxlength="10" id="contact" name="contact">
                    <i class="bx bx-user"></i>
                </div>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Address" id="address" name="address">
                <i class="bx bx-user"></i>
            </div>
            
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Username" id="username" name="username">
                <i class="bx bx-user"></i>
            </div>
            <div class="two-form">
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password" id="username" name="password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="password"  class="input-field" placeholder="Confirm Password">
                    <i class="bx bx-lock-alt"></i>
                </div>
            </div>
            <div class="input-box" id="reg">
                <input type="submit" class="submit" value="Register">
            </div>    
            </form>
    </div>
</div>   
<script>
   
   function myMenuFunction() {
    var i = document.getElementById("navMenu");

    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
   }
 
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");

    a.addEventListener("click", function () {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.classList.add("white-btn");
        b.classList.remove("white-btn");
        x.style.opacity = 1;
        y.style.opacity = 0;
    });

    b.addEventListener("click", function () {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.classList.remove("white-btn");
        b.classList.add("white-btn");
        x.style.opacity = 0;
        y.style.opacity = 1;
    });
});

</script>
</body>
</html>