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


$amount=$_POST['amount'];
$upiid=$_POST['upiid'];

$phnno=$_POST['phnno'];
$name=$_POST['name'];
$query="INSERT INTO `withdraw`(`username`, `balance`, `amount`, `upiid`, `phnno` , `name`) VALUES ('$username','$balance','$amount','$upiid','$phnno' ,'$name')";
$result=mysqli_query($conn,$query);
$balance=$balance-$amount;
$query1="UPDATE `users` SET `balance`='$balance' WHERE username='$username'";
$result1=mysqli_query($conn,$query1);
if($result && $result1)
{
    echo "<script>alert('your request is processed within 30 minutes.Be patient. ')</script>";
    echo "<script>location.href='withdraw.php'</script>";

}
else{
    echo "<script>alert('something went wrong .try again later ')</script>";
    echo "<script>location.href='withdraw.php'</script>";


}

?>