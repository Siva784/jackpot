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
$query1="SELECT  `ad1`, `ad2`, `ad3`, `marq1`, `promo` FROM `ads` WHERE author='$author' ";
$result1=mysqli_query($conn,$query1);
$row1=mysqli_fetch_row($result1);
$ad1=$row1[0];
$ad2=$row1[1];
$ad3=$row1[2];
$marq1=$row1[3];
$promo=$row1[4];


?>
  
<div class="container text-center"> 
  <marquee><h3 style="color:red"><?php echo "$marq1"?></h3></marquee>   
  <div class="row">
    <div class="col-sm-3 well">
      <!-- <div class="well">
        <p><a href="#">My Profile</a></p>
        <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
      </div> -->
      <div class="well">
        <p>Balance :<?php echo "$balance";?> Rs </p>
    
       
        <button type="button" class="btn btn-warning" onclick="func4()">Deposit</button>
        <button type="button" class="btn btn-success" onclick="withdraw()">Withdraw</button>

      </div>
      <div class="well">
        <!-- <p><a href="#">My Profile</a></p> -->
        <img src="images/dice2.gif"  height="90" width="150" alt="Avatar">
        <p>"Luck is not as random as you think. Before You won the Lottery or jackpot, You had to buy it."</p>
      </div>
      <div class="well">
        <p><strong>Promo Code : </strong></p>
        <mark><?php echo "$promo"?></mark>
      </div>      
      <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <img src="images/dice3.gif" width="55" height="55">
        <p><strong><?php echo "$ad1"?></strong></p>
        
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
                <div class="col-sm-8">
                    <img src="images/dice4.gif" width="100" height="100"><br>
                    <h3>Jackpot with Dual Dice</h3>
                    <p>below 7 / equal 7 / above 7 </p>

                </div>
                
                <div class="col-sm-4">
                    <br><br>
                
                <button type="button" class="btn btn-success" onclick="func1()">PLAY GAME</button>
                
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="well">
            <div class="row">
                <div class="col-sm-8">
                <img src="images/spinningwheel.jpg" width="220" height="155"><br>
                <h3>Jackpot with Spinning Wheel</h3>

                   
                </div>
                
                <div class="col-sm-4">
                <br><br>

                <button type="button" class="btn btn-success" onclick="func3()">PLAY Spinning Wheel</button>

                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="well">
            <div class="row">
                <div class="col-sm-8">
                    <img src="images/freespin1.jpg" width="180" height="135"><br>
                    <h3>Jackpot with Free Spin</h3>
                    <p>Free Spin will be enable at 12'O clock only for 1 minute. </p>

                    

                </div>
                
                <div class="col-sm-4">
                    <br><br>
                
                <button type="button" class="btn btn-success" id="freespin" onclick="func2()">PLAY  Free Spin</button>

                
                </div>
            </div>
          </div>
        </div>
      </div>
    
          
    </div>
    <div class="col-sm-2 ">
    <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <img src="images/dice1.gif" width="55" height="55">
        <p><strong><?php echo "$ad2"?></</strong></p>
        
      </div>
      <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <img src="images/dice.gif" width="55" height="55">
        <p><strong><?php echo "$ad3"?></</strong></p>
        
      </div>
      
    </div>
  </div>
</div>

<?php
include ('footer.php');

?>
<script>
  function withdraw()
{
  location.href="withdraw.php";
}

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
function func1(){
    location.href='realgame.php';
}
function func2(){
    location.href='freespin.php';
}
function func3(){
    location.href='spinningwheel.php';
}
function func4(){
    location.href='deposit.php';
}

</script>

</body>
</html>
