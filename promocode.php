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



$query="SELECT `promocodestatus` FROM `users` WHERE username='$username'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_row($result);

$promostatus=$row[0];
if($promostatus==0)
{
    $balance=$balance+150;
    $promostatus=1;
    $query1="UPDATE `users` SET `balance`='$balance',`promocodestatus`='$promostatus' WHERE username='$username'";
    $result1=mysqli_query($conn,$query1);
    if($query && $result1)
    {
        echo "<script>alert('PromoCode applied. 50 Rs added to your balance')</script>";
        echo "<script>location.href='deposit.php'</script>";


    }
    else{
        echo "<script>alert('Invalid')</script>";
        echo "<script>location.href='main.php'</script>";

    }
    
}
else{
    echo "<script>alert('promo already applied ')</script>";
    echo "<script>location.href='main.php'</script>";

}



?>