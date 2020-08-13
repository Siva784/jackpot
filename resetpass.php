<?php
include ( 'connection.php' );

$username=$_POST['username'];
$fspin=$_POST['fspin'];
$query=" SELECT  `username` FROM `users` WHERE username = '$username'";
$result=mysqli_query ($conn,$query);
$num_rows = mysqli_num_rows($result);

if($num_rows==0)
{
	echo "<script>alert ('Invalid username') </script>";
	echo "<script>location.href='fpassword.php'</script>";
}
else
{
	while($row=mysqli_fetch_row($result))
	{
		$username=$row[0];
		
		session_start();
		$_SESSION['tempusername']=$username;
		
		//echo "<script>alert($_SESSION['tempusername'])</script>";
	//	echo "<script>alert($username)</script>";
	}
	$query1="SELECT  `spin` FROM `users` WHERE username = '$username'";
	$result1=mysqli_query($conn,$query1);
	while($row1=mysqli_fetch_row($result1))
	{
		$fspin1=$row1[0];
	}
	if($fspin==$fspin1)
	{
		echo "<script>location.href='newpassword.php' </script> ";
	}

	else
	{
		echo "<script>alert('enter correct security pin') </script>";
		echo "<script> location.href='fpassword.php' </script>"; 
	}
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

				
	<div id="dropDownSelect1"></div>
	
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

