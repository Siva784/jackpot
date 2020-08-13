<?php
include('../connection.php');
$username=$_POST['username'];

$balance=$_POST['balance'];

$amount=$_POST['amount'];
$transid=$_POST['transid'];

$balance=$balance+$amount;

$trans=1;
$query="UPDATE `users` SET `balance`='$balance' WHERE username='$username'";
$query1="UPDATE `deposit` SET `transstatus`='$trans' WHERE username='$username' and transactionid='$transid'";
$result=mysqli_query($conn,$query);

$result1=mysqli_query($conn,$query1);
if($result && $result1)
{
  echo "<script>location.href='pendingdeposit.php'</script>";
}
else{
  echo "<script>alert('not success')</script>";
  //echo "<script>location.href='pendingdeposit.php'</script>";


}
?>