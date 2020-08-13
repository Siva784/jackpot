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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="realgamescript.js"></script>
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
$query1="SELECT  `ad1`, `ad2`, `ad3`, `marq1` FROM `ads` WHERE author='$author' ";
$result1=mysqli_query($conn,$query1);
$row1=mysqli_fetch_row($result1);
$ad1=$row1[0];
$ad2=$row1[1];
$ad3=$row1[2];
$marq1=$row1[3];


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
        <button type="button" class="btn btn-warning" onclick="deposit()">Deposit</button>
        <button type="button" class="btn btn-success" onclick="withdraw()">Withdraw</button>
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
      <div>
            <h3>Instructions / steps :</h3>
          <p>1.click "Bet on" to select value.<br>2. click "Bet amount" to select bet amount.<br>3.now click "Roll"  to roll the dice.<br>4.After the result ,click "Play again" to play again and follow the same steps.<br> </p>

          </div>
        <div class="col-sm-6">
          
          <div class="well">
            <p>Play Shell</p>          
           <img src="images/1.jpg"  height="90" width="100" alt="click roll again" id="dice1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           <img src="images/6.jpg" height="90" width="100" alt="click roll again" id="dice2">
           <br>
             <input type="text" id="beton2" name="beton2" style="display:none">
             <input type="text" id="betamount2" name="betamount2" style="display:none" >
             <input type="text" id="dicevalue1" name="dicevalue1" style="display:none">
             <input type="text" id="dicevalue2" name="dicevalue2" style="display:none" >
            <div style="font-size:45px"> <button type="button" class="btn btn-success" id="roll" onclick="roll1()" disabled><img src="images/dice6.gif" width='30' height='30'>Roll</button>
            <button type="button" class="btn btn-warning" onclick="playagain()" id="playagain">Play Again</button>
            <br>
            <p id="result12"></p>
            </div>
            

          </div>
        </div>
        <div class="col-sm-6">
          <div class="well">
      <p id="balance3"></p>
      <script>        document.getElementById('balance3').innerHTML="Balance : "+balance+" Rs";
</script>
          <button type="button" class="btn btn-danger" id="beton" onclick="beton()">Bet on</button>
          <p id="beton1"></p>
          <div id="betopen1"></div>
          <div id="lessbalance"></div>
        <br>
          <button type="button" class="btn btn-primary" id="betamount" disabled onclick="betamount()">Bet amount</button>
          <p id="betamount1"></p>
          <div id="betopen"></div>

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
      
    </div>
  </div>
</div>

<?php
include ('footer.php');

?>

<!-- <script type="text/javascript">
var jvalue = 'this is javascript value';
 
</script> -->

<script>
  function deposit()
  {
    location.href="deposit.php";
  }
  function withdraw()
{
  location.href="withdraw.php";
}

    document.getElementById('beton2').style.display = 'none';
    document.getElementById('betamount2').style.display = 'none';
    document.getElementById('dicevalue1').style.display = 'none';
    document.getElementById('dicevalue2').style.display = 'none';

  if(balance<25)
  {
    document.getElementById("beton").disabled = true;
    document.getElementById("betamount").disabled = true;
    document.getElementById("roll").disabled = true;
    document.getElementById("lessbalance").innerHTML ="Your Balance is Less than 25 .Deposit to continue the game";

  }
  
  function playagain()
  {
    location.reload(true);

  }
 
  function beton()
  {
    document.getElementById('betopen1').innerHTML="<div id='betonele'><button type='button' class='btn btn-warning' onclick='takebeton(value)' id='below7' value='<7'><7 (less than 7)</button>&nbsp&nbsp<button type='button' class='btn btn-warning' onclick='takebeton(value)' id='above7' value='>7'>>7(greater than 7)</button><br><br><button type='button' class='btn btn-warning' onclick='takebeton(value)' id='equal7' value='=7'>=7(equal to 7)</button></div>";
    document.getElementById('playagain').disabled= true;

  
  }
  function takebeton(value)
  {
    var selectedvalue=value;
    document.getElementById('beton1').innerHTML=selectedvalue;
    document.getElementById('beton2').value=selectedvalue;
    document.getElementById('betopen1').innerHTML="";
    document.getElementById("beton").disabled = true;
    document.getElementById("betamount").disabled = false;
  }

  function betamount()
  {
    document.getElementById('betopen').innerHTML="<div><button type='button' class='btn btn-warning' onclick='takebetamount(value)' id='25' value='25'>25 RS</button>&nbsp<button type='button' class='btn btn-warning' onclick='takebetamount(value)' id='50' value='50'>50 RS</button>&nbsp<button type='button' class='btn btn-warning' onclick='takebetamount(value)' id='100' value='100'>100 RS</button><br><br><button type='button' class='btn btn-warning' onclick='takebetamount(value)' id='200' value='200'>200 RS</button>&nbsp<button type='button' class='btn btn-warning' onclick='takebetamount(value)' id='500' value='500'>500 RS</button>&nbsp<button type='button' class='btn btn-warning' onclick='takebetamount(value)' id='1000' value='1000'>1000 RS</button></div>";
  }
  function takebetamount(value)
  {
    var selectedamount=parseInt(value);
    document.getElementById('betamount1').innerHTML=selectedamount+"Rs";
    var selectedvalue=document.getElementById('beton2').value;
    document.getElementById('betamount2').value=selectedamount;
    document.getElementById('betopen').innerHTML="";
    document.getElementById("betamount").disabled = true;
    var x = Math.floor((Math.random() * 10) + 1);
    var y = Math.floor((Math.random() * 10) + 1);
    if(x>6)
    {
      x=x-4;
    }
    if(y>6)
    {
      y=y-4;
    }
    if(balance>600 && selectedvalue=="<7")
    {
      if(x<=6)
    {
      x=5;
    }
    if(y<6)
    {
      y=5;
    }
    }
    if(balance>600 && balance<700 &&selectedvalue==">7")
    {
      x=2;
      y=2;
    }
    if(balance>700 && balance<800 &&selectedvalue==">7")
    {
      x=4;
      y=2;
    }
    document.getElementById('dicevalue1').value=x;
    document.getElementById('dicevalue2').value=y;
    
   
    if(selectedamount>balance)
    {
      alert("insufficient funds");
      document.getElementById("roll").disabled = true;
      document.getElementById("betamount").disabled = false;
      document.getElementById("betamount1").innerHTML = "";


    }
    else
    {
      document.getElementById("roll").disabled = false;

    }


  }
function roll1()
{
    document.getElementById('dice1').src="images/dice5.gif";
    document.getElementById('dice2').src="images/dice5.gif";
    document.getElementById("roll").disabled = true;
    setTimeout(rolldecide, 3000);
}
function rolldecide()
{
    var x1=$('#dicevalue1').val();
    var y1=$('#dicevalue2').val();
    var beton2=$('#beton2').val();
    var betamount2=$('#betamount2').val();
    document.getElementById('dice1').src="images/"+x1+".jpg";
    document.getElementById('dice2').src="images/"+y1+".jpg";
    $.ajax({
method: "post",
url : "money.php",
data: {dicevalue1:x1,dicevalue2:y1,beton:beton2,betamount:betamount2}

    })
    .done(function(data){
      var d = JSON.parse(data);
      $('#result12').html(d.status);
      $('#balance2').html("Balance :"+d.balance+" Rs");
      $('#balance3').html("Balance :"+d.balance+" Rs");
      $('#balance1').val()= d.balance;
    });
    document.getElementById('playagain').disabled= false;
    
   

    
 }




</script>

</body>
</html>
