
<?php
session_start();
include('connection.php');
if(isset($_SESSION['tempusername']))
{
	
	$username=$_SESSION['tempusername'];
    
}
else
{
    echo "<script>location.href='fpassword.php'</script>";

}
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];
    $query="UPDATE `users` SET `password`='$password' WHERE username='$username'";
    $result=mysqli_query($conn,$query);
    if($query && $result)
    {
        echo "<script>alert('password changed successfully')</script>";
        session_destroy();
        echo "<script>location.href='index.php'</script>";
    }
    else
    {
        echo "<script>alert('password not changed ,Try Again')</script>";
        session_destroy();
        echo "<script>location.href='fpassword.php'</script>";


    }
		
		
		?>