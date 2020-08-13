<html>
<head>
</head>
<body>
<?php
$wname=$_POST['wname'];



$password=$_POST['password'];
include('../connection.php');
$query="SELECT  `password` FROM `admin` WHERE username='$wname'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_row($result))
{
$pswd=$row[0];

}
if($pswd==$password)
{
session_start();
$_SESSION['wname']=$wname;

echo "<script>location.href='index.php'</script>";
}
else
{
	header('Location: pages/examples/login.php?id=err');
}

?>


</body>
</html>



