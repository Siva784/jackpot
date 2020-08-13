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

$dicevalue1=$_POST['dicevalue1'];
$dicevalue2=$_POST['dicevalue2'];
$beton=$_POST['beton'];
$betamount=$_POST['betamount'];

if($beton=="<7")
{
    if(($dicevalue1+$dicevalue2)<7)
    {
       
        $balance=$balance+$betamount;
        $query="UPDATE `users` SET `balance`='$balance' WHERE username='$username'";
        $result=mysqli_query($conn,$query);
        if($result)
        {
            $arr = array(
                "status" => "You Won the Bet",
                "balance" => $balance
            );
            echo json_encode($arr);
        }
        
    }
    else{
        $balance=$balance-$betamount;
        $query="UPDATE `users` SET `balance`='$balance' WHERE username='$username'";
        $result=mysqli_query($conn,$query);
        if($result)
        {
            $arr = array(
                "status" => "You Loose the Bet",
                "balance" => $balance
            );
            echo json_encode($arr);
        }

    }
}

if($beton=="=7")
{
    if(($dicevalue1+$dicevalue2)==7)
    {
       
        $balance=$balance+$betamount;
        $query="UPDATE `users` SET `balance`='$balance' WHERE username='$username'";
        $result=mysqli_query($conn,$query);
        if($result)
        {
            $arr = array(
                "status" => "You Won the Bet",
                "balance" => $balance
            );
            echo json_encode($arr);
        }
        
    }
    else{
        $balance=$balance-$betamount;
        $query="UPDATE `users` SET `balance`='$balance' WHERE username='$username'";
        $result=mysqli_query($conn,$query);
        if($result)
        {
            $arr = array(
                "status" => "You Loose the Bet",
                "balance" => $balance
            );
            echo json_encode($arr);
        }

    }
}
if($beton==">7")
{
    if(($dicevalue1+$dicevalue2)>7)
    {
       
        $balance=$balance+$betamount;
        $query="UPDATE `users` SET `balance`='$balance' WHERE username='$username'";
        $result=mysqli_query($conn,$query);
        if($result)
        {
            $arr = array(
                "status" => "You Won the Bet",
                "balance" => $balance
            );
            echo json_encode($arr);
        }
        
    }
    else{
        $balance=$balance-$betamount;
        $query="UPDATE `users` SET `balance`='$balance' WHERE username='$username'";
        $result=mysqli_query($conn,$query);
        if($result)
        {
            $arr = array(
                "status" => "You Loose the Bet",
                "balance" => $balance
            );
            echo json_encode($arr);
        }

    }
}






?>