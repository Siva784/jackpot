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
<div class="container text-center">    
  <div class="row">
    <div class="col-sm-3 well">
      <!-- <div class="well">
        <p><a href="#">My Profile</a></p>
        <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
      </div> -->
      <div class="well">
      <p id="balance2"></p>
        <input type="text" id="balance1" style="display:none" value=<?php echo "$balance"?>>
        <script>
        var balance=parseInt(document.getElementById('balance1').value);
        
        document.getElementById('balance2').innerHTML="Balance : "+balance+" Rs";

        </script>
     
     
     <p id="withdrawstat"></p>
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
          <div class="well">
            <div class="row">
                <div class="col-sm-6">
         
                <h3 style="color:red">Note</h3>
                <ol>
                  <li>Withdraw amount must be atleast 1000 Rs</li>
                  
                    <li>After Submission your request will be processed with in 30 minutes.</li>
                </ol>
               
                </div>
                
                <div class="col-sm-6">
                <form method="POST" action="withdrawamount.php" onsubmit="return validate()">
                <div class="form-group">
                  <label for="inputsm">Amount ( in Rupees): </label>
                  <input class="form-control input-sm" id="amount" name="amount" type="text" required>
                </div>
                <div class="form-group">
                  <label for="inputsm">UPI ID </label>
                  <input class="form-control input-sm" id="upiid" name="upiid" type="text" required>
                </div>
                <div class="form-group">
                  <label for="inputsm">Phn no : </label>
                  <input class="form-control input-sm" id="phnno" name="phnno" type="text" required>
                </div>
                <div class="form-group">
                  <label for="inputsm">Name linked : </label>
                  <input class="form-control input-sm" id="name" name="name" type="text" required>
                </div>
                
                <div class="form-group">
                  <input class="form-control" id="submit" name="submit" type="submit">
                </div>
                </form>
                
                
                </div>
            </div>
          </div>
        </div>
      </div>
     
     
    </div>
    <div class="col-sm-2 ">
    <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <img src="images/dice3.gif" width="55" height="55">
        <p><strong>Hey!</strong></p>
        <p><strong>Free Spin will be enable at 12'O clock for 1 minute,go and win.</strong></p>
        <p><strong>Hurry up!</strong></p>

      </div>
    </div>
  </div>
</div>

<?php
include ('footer.php');

?>
<script>
  
if(balance<1000)
{
  document.getElementById("withdrawstat").innerHTML="Your Balance is less than 1000 Rupees .You cannot withdraw Now.";
  document.getElementById("amount").disabled= true;
  document.getElementById("upiid").disabled= true;
  document.getElementById("name").disabled= true;
  document.getElementById("phnno").disabled= true;
  document.getElementById("submit").disabled= true;

  
}


function validate()
{
  var amount = document.getElementById("amount").value;
  var aml=amount.length;
  if(amount<1000)
  {
    alert('Deposit amount must be atleast 1000 Rs');

    return false;
  }
  
  return true;
}


</script>

</body>
</html>
