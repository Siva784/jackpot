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
    <div class="col-sm-3 well">
      <!-- <div class="well">
        <p><a href="#">My Profile</a></p>
        <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
      </div> -->
      <div class="well">
        <p>Balance :<?php echo "$balance";?> Rs </p>
      </div>
    <div>
     
                <div class="form-group">
                  <label for="inputsm">Promo Code : </label>
                  <input class="form-control input-sm" id="promo" name="promo" type="text" required>
                </div>
                <p id="promostatus1" name="promostatus1"></p>
                <input type="text" id="dbpromocode" name="dbpromo" style="display:none" value=<?php echo "$dbpromocode"?> >
                <input type="text" id="dbpromostatus" name="dbpromostatus" style="display:none" value=<?php echo "$dbpromostatus"?> >
                <button type="button" class="btn btn-success" onclick="applypromo()">Apply Promo</button>

  
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
                  <li>Deposit amount must be atleast 300 Rs</li>
                  <li>verify the name and UPI ID before sending the money.</li>
                  <li>send the money through any UPI transaction app to the given UPI Id.</li>
                    <li>Type the amount you deposit and transaction id in the given form and submit.</li>
                    <li>your request will be processed with in 30 minutes.</li>
                </ol>
                <p>Name :<p>
                <p>yakkala bala naga venkata siva gopal</p>
                <p>UPI ID :</p><p id="upiid">jackpotwin@apl</p><input type="text" value="jackpotwin@apl" style="display:none"><button onclick="func5()">Copy</button>
                    


                </div>
                
                <div class="col-sm-6">
                <form method="POST" action="receiveamount.php" onsubmit="return validate()">
                <div class="form-group">
                  <label for="inputsm">Amount ( in Rupees): </label>
                  <input class="form-control input-sm" id="amount" name="amount" type="text" required>
                </div>
                <div class="form-group">
                  <label for="inputsm">Transaction Id :</label>
                  <input class="form-control input-sm" id="transid" name="transid" type="text" required>
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
  
var date = new Date();
  var hours = date.getHours();
  var minutes = date.getMinutes();

if(hours==13 && minutes==0)
{
  document.getElementById('freespin').disabled=false;
}
else{
  document.getElementById('freespin').disabled=true;

}

function func5(){
  var copyText = document.getElementById("upiid").value;
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  
}
function validate()
{
  var amount = document.getElementById("amount").value;
  var aml=amount.length;
  if(amount<300)
  {
    alert('Deposit amount must be atleast 300 Rs');
    return false;
  }

}

function applypromo()
{
  var promocode=document.getElementById('promo').value;
  var promocodel=promocode.length;
  var dbpromocode=document.getElementById('dbpromocode').value;
  var dbpromostatus=document.getElementById('dbpromostatus').value;
  if(promocodel==0)
  {
    alert("enter promocode");
  }
  else if(dbpromostatus==0)
  {
    if(promocode==dbpromocode)
    {
        location.href="promocode.php";
    }
    else
    {
      document.getElementById('promostatus1').innerHTML="Invalid PromoCode";
    }

  }
  else
  {
   document.getElementById('promostatus1').innerHTML="Promocode Already applied";

  }
}
</script>

</body>
</html>
