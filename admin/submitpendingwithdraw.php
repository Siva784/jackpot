<?php
include('../connection.php');
$id=$_POST['id'];
echo "<script>alert('$id')</script>";


$transactionid=$_POST['transactionid'];
echo "<script>alert('$transactionid')</script>";


$paystatus=1;
$query="UPDATE `withdraw` SET `paystatus`='$paystatus' ,`transactionid`='$transactionid' WHERE id='$id'";
$result=mysqli_query($conn,$query);

if($result)
{
  echo "<script>alert('success')</script>";


 echo "<script>location.href='pendingwithdraw.php'</script>";
}
else{
  echo "<script>alert('not success')</script>";
  echo "<script>location.href='pendingwithdraw.php'</script>";


}
?>