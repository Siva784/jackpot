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
$transid=$_POST['transid'];
$query="INSERT INTO `deposit`( `username`, `balance`, `amount`, `transactionid`) VALUES ('$username','$balance','$amount','$transid')";
$result=mysqli_query($conn,$query);
if($query && $result)
{
    echo "<script>alert('your request is processing ')</script>";
    echo "<script>location.href='main.php'</script>";
}
else{
    echo "<script>alert('something went wrong .try again later ')</script>";

}


?>