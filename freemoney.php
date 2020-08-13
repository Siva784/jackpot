<?php
session_start();
include('connection.php');
if(isset($_SESSION['username']))
{
	
    $username=$_SESSION['username'];
    $balance=$_SESSION['balance'];
    
}
else
{
    echo "<script>location.href='index.php'</script>";

}
$winamount=$_POST['winamount'];
$balance=$balance+$winamount;
$query="UPDATE `users` SET `balance`='$balance' WHERE username='$username'";
$result=mysqli_query($conn,$query);
if($query && $result)
{
    echo "$balance";
}

?>