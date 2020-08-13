
<?php
session_start();
if(isset($_SESSION['tempusername']))
{
	
	$username=$_SESSION['tempusername'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>JACK-POT</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/gif" href="images/dice.gif"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


	
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<div>
					<img src="images/dice.gif">
					<img src="images/jackpot.jpg">
				</div>
				<form class="login100-form validate-form flex-sb flex-w" action="resetconf.php" method="POST" onsubmit="return validate1()">
					<!-- <span class="login100-form-title p-b-53">
						Sign In With
					</span>

					<a href="#" class="btn-face m-b-20">
						<i class="fa fa-facebook-official"></i>
						Facebook
					</a>

					<a href="#" class="btn-google m-b-20">
						<img src="images/icons/icon-google.png" alt="GOOGLE">
						Google
					</a>
					 -->
					 
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							New password
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "password is required">
						<input class="input100" type="password" name="password" id="password" >
						<p id="err1" style="color:red"></p>
						<span class="focus-input100"></span>
						<input type="checkbox" onclick="Toggle2()"><p>Show Password</p>

					</div>
					
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Retype Password
						</span>

						
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="repassword" id="repassword" >
						<p id="err2" style="color:red"></p>
						<span class="focus-input100"></span>
						<input type="checkbox" onclick="Toggle3()"><p>Show Password</p>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<!-- <button class="login100-form-btn">
							Sign In
						</button> -->
						<input type="submit" value="Confirm Reset" class="login100-form-btn" name="submit">
					</div>

					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	

	<script>
        function validate1()
        {
            var password=document.getElementById('password').value;
            var repassword=document.getElementById('repassword').value;
            var pwdreg= /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
        
            if(!password.match(pwdreg))
            {
			document.getElementById('err1').innerHTML="password should be strong";
			return false;
			}
            if(password!=repassword)
            {
                document.getElementById('err2').innerHTML="password not matched";
			    return false;
            }
            return true;
        }
		function Toggle2()
        {
            var temp = document.getElementById("password"); 
            if (temp.type === "password") { 
                temp.type = "text"; 
            } 
            else { 
                temp.type = "password"; 
            } 
        }
        function Toggle3()
        {
            var temp1 = document.getElementById("repassword"); 
            if (temp1.type === "password") { 
                temp1.type = "text"; 
            } 
            else { 
                temp1.type = "password"; 
            } 
        }
		</script>
      
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
