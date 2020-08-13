<?php
session_start();
include('connection.php');
if(isset($_SESSION['username']))
{
	
	$username=$_SESSION['username'];
    
}
else
{
    echo "<script>location.href='index.php'</script>";

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>JackPot</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/gif" href="images/dice.gif"/>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>
<?php
include ('connection.php');
$query="SELECT  `balance` FROM `users` WHERE username='$username'";
$result=mysqli_query($conn,$query);

$row=mysqli_fetch_row($result);
$balance=$row[0];
$_SESSION['balance']=$balance;
?>
<?php
include ('header.php');


?>
<?php

$author="siva";
$query1="SELECT  `promo` FROM `ads` WHERE author='$author'";
$result1=mysqli_query($conn,$query1);
$row1=mysqli_fetch_row($result1);
$dbpromocode=$row1[0];

$query2="SELECT `promocodestatus` FROM `users` WHERE username='$username'";
$result2=mysqli_query($conn,$query2);
$row2=mysqli_fetch_row($result2);

$dbpromostatus=$row2[0];
?>
  
<div class="container text-center">    
  <div class="row">
    <div class="col-sm-3">
      <!-- <div class="well">
        <p><a href="#">My Profile</a></p>
        <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
      </div> -->
      
    <div>
     
                
             
  
    </div>
    </div>
    <div class="col-sm-7">
    
      <!-- <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
            <img src="images/dice4.gif" width="225" height="145"><br>
            <h3>Jackpot with Dual Dice</h3>
            <p>above 7 / equal 7 / above 7</p>

            </div>
          </div>
        </div>
      </div>
       -->
      <div class="row">
        <div class="col-sm-12">
          
                  <h3>Deposit transactions</h3>
                  <?php
                  
                $query3="SELECT `amount`, `transactionid`, `transstatus` FROM `deposit` WHERE username='$username'";
                $result3=mysqli_query($conn,$query3);
               
            
                echo "<div class='table-responsive'>";
                
              echo "<table border='1' align='center' class='table'>";
              
              echo "<tr>";
              echo "<td class='success'>Amount</td>";
              echo "<td class='danger'>Transaction id</td>";
              echo "<td class='warning'>Transaction status </td>";
              echo "</tr>";

              while($row3=mysqli_fetch_row($result3))
              {
                if($row3[2]==0)
                {
                  $status="Pending";
                }
                else{
                  $status="Success";

                }
              echo "<tr>";
              echo "<td class='success'>&nbsp$row3[0]&nbsp</td>";
              echo "<td class='danger'>&nbsp$row3[1]&nbsp</td>";
              echo "<td class='warning'>&nbsp$status&nbsp</td>";
              echo "</tr>";
              }
              
              echo "</table>";
              
              echo "</div>";
            
            
                  ?>
               

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                <h3>Withdraw transactions</h3>
                  <?php
                  
                $query4="SELECT  `amount`, `upiid`, `phnno`, `name`, `paystatus`, `transactionid` FROM `withdraw` WHERE username='$username'";
                $result4=mysqli_query($conn,$query4);
               
            
                echo "<div class='table-responsive'>";
                
              echo "<table border='1' align='center' class='table'>";
              
              echo "<tr>";
              echo "<td class='success'>Amount</td>";
              echo "<td class='danger'>UPI ID</td>";
              echo "<td class='info'>Phone Number</td>";
              echo "<td class='warning'>Name Linked</td>";
              echo "<td class='danger'>Pay Status</td>";
              echo "<td class='warning'>Transaction Id </td>";
              echo "</tr>";

              while($row4=mysqli_fetch_row($result4))
              {
                if($row4[4]==0)
                {
                  $status="Pending";
                }
                else{
                  $status="Success";

                }
                if($row4[5]==0)
                {
                  $transid="--";
                }
                else{
                  $transid=$transid;

                }
              echo "<tr>";
              echo "<td class='success'>&nbsp$row4[0]&nbsp</td>";
              echo "<td class='danger'>&nbsp$row4[1]&nbsp</td>";
              echo "<td class='info'>&nbsp$row4[2]&nbsp</td>";
              echo "<td class='warning'>&nbsp$row4[3]&nbsp</td>";
              echo "<td class='danger'>&nbsp$status&nbsp</td>";
              echo "<td class='warning'>&nbsp$transid&nbsp</td>";

              echo "</tr>";
              }
              
              echo "</table>";
              
              echo "</div>";
            
            
                  ?>
               
                
                
                </div>
            </div>
        </div>
      
    <div class="col-sm-2 ">
    <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <img src="images/dice3.gif" width="55" height="55">
        <p><strong>Hey!</strong></p>
        <p><strong>Free Spin will be enable at 12'O clock for 1 minute,go and win.</strong></p>
        <p><strong>Don't miss !</strong></p>

      </div>
    </div>
  </div>
</div>
<?php
include ('footer.php');

?>


</body>
</html>
