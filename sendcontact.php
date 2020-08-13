<?php
session_start();
include ('connection.php');
if(isset($_SESSION['username']))
{
	
    $username=$_SESSION['username'];
    $balance=$_SESSION['balance'];
    
}
else
{
    echo "<script>location.href='index.php'</script>";

}
$email=$_POST['email'];
$name=$_POST['name'];
$message=$_POST['message'];
$query="INSERT INTO `contact`(`email`, `name`, `message`) VALUES ('$email','$name','$message')";
$result=mysqli_query($conn,$query);
if($result)
{
    echo "<script>alert('Submitted')</script>";

    echo "<script>location.href='contact.php'</script>";

}
else{
    echo "<script>alert('Something went wrong .try again later.')</script>";

}


?>