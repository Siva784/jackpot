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

$spinnedvalue=$_POST['spinnedvalue'];
$spinstatus="";
if($spinnedvalue=="+10")
{
    $balance=$balance+10;
    $spinstatus="you won 10 Rs";
}
else if($spinnedvalue=="-10")
{
    $balance=$balance-10;
    $spinstatus="you Loose 10 Rs";


}
else if($spinnedvalue=="+25")
{
    $balance=$balance+25;
    $spinstatus="you won 25 Rs";


}
else if($spinnedvalue=="-25")
{
    $balance=$balance-25;
    $spinstatus="you Loose 25 Rs";


}
else if($spinnedvalue=="-90")
{
    $balance=$balance-90;
    $spinstatus="you loose Rs";


}
else if($spinnedvalue=="-50")
{
    $balance=$balance-50;
    $spinstatus="you Loose 50 Rs";


}
else if($spinnedvalue=="-100")
{
    $balance=$balance+75;
    $spinstatus="you loose 100 Rs";


}
else if($spinnedvalue=="-75")
{
    $balance=$balance-75;
    $spinstatus="you Loose 75 Rs";


}
$query="UPDATE `users` SET `balance`='$balance' WHERE username='$username'";
        $result=mysqli_query($conn,$query);
        if($result)
        {
            $arr = array(
                "spinstatus" => $spinstatus,
                "balance" => $balance
            );
            echo json_encode($arr);
        }


?>