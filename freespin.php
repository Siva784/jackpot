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
  <link rel="stylesheet" href="main1.css" type="text/css" />
  <script type="text/javascript" src="Winwheel.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
$author="siva";
$query1="SELECT  `ad1`, `ad2`, `ad3`, `marq1` FROM `ads` WHERE author='$author' ";
$result1=mysqli_query($conn,$query1);
$row1=mysqli_fetch_row($result1);
$ad1=$row1[0];
$ad2=$row1[1];
$ad3=$row1[2];
$marq1=$row1[3];


?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Portfolio</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Gallery</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

  
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
        <div class="col-sm-12">
          <div class="well">
            <p id="balance3"></p>
            <script>       
             document.getElementById('balance3').innerHTML="Balance : "+balance+" Rs";



</script>

<p id="err1"></p>
  <table><tr>
                    <td width="300" height="300" class="the_wheel" align="center" valign="center" >
                      <img src="selector.png">
                        <canvas id="canvas" width="250" height="180" >
                            <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                        </canvas>
                    </td>
                </tr>
            </table>
       
            
          <table cellpadding="0" cellspacing="0" border="0" align="center">
                <tr>
                    <td>
                        <div class="power_controls">
                            
                            <!-- <table class="power" cellpadding="10" cellspacing="0">
                                <tr>

                                    <th align="center">Power</th>
                                </tr>
                                <tr>
                                    <td width="78" align="center" id="pw3" onClick="powerSelected(3);">High</td>
                                </tr>
                                <tr>
                                    <td align="center" id="pw2" onClick="powerSelected(2);">Med</td>
                                </tr>
                                <tr>
                                    <td align="center" id="pw1" onClick="powerSelected(1);">Low</td>
                                </tr>
                            </table> -->
                            <button id="spinstat" onClick="startSpin();"><img id="spin_button" src="spin_off.png" alt="Spin"  /></button>
                            <br /><br />
                            &nbsp;&nbsp;<button id="playagain1" onClick="resetWheel(); return false;">Play Again</button><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </td>
  </tr></table>

          </div>
        </div>
        
      </div>
    
         
    </div>
    <div class="col-sm-2">
    <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <img src="images/dice.gif" width="55" height="55">
        <p><strong><?php echo "$ad3"?></</strong></p>
        
      </div>
     
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

<!-- <script type="text/javascript">
var jvalue = 'this is javascript value';
 
</script> -->

<script>

var date = new Date();
  var hours = date.getHours();
  var minutes = date.getMinutes();
  
  if(hours==13 && minutes==0 )
{
  document.getElementById('spinstat').disabled=false;

  document.getElementById('playagain1').disabled=false;
}
else{
  document.getElementById('spinstat').disabled=true;

document.getElementById('playagain1').disabled=true;

document.getElementById('err1').innerHTML="Spin is available at 12'O Clock for one minute only";
}

function deposit()
{
  location.href="deposit.php";
}
function withdraw()
{
  location.href="withdraw.php";
}



            // Create new wheel object specifying the parameters at creation time.
            let theWheel = new Winwheel({
                'numSegments'       : 4,         // Specify number of segments.
                'outerRadius'       : 90,       // Set outer radius so wheel fits inside the background.
                'drawMode'          : 'image',   // drawMode must be set to image.
                'drawText'          : true,      // Need to set this true if want code-drawn text on image wheels.
                'textFontSize'      : 16,        // Set text options as desired.
                'textOrientation'   : 'curved',
                'textDirection'     : 'reversed',
                'textAlignment'     : 'outer',
                'textMargin'        : 5,
                'textFontFamily'    : 'monospace',
                'textStrokeStyle'   : 'black',
                'textLineWidth'     : 2,
                'textFillStyle'     : 'white',
                'segments'     :                // Define segments.
                [
                   {'text' : '40'},
                   {'text' : '30'},
                   {'text' : '20'},
                   {'text' : '10'}
                ],
                'animation' :                   // Specify the animation to use.
                {
                    'type'     : 'spinToStop',
                    'duration' : 20,     // Duration in seconds.
                    'spins'    : 13,     // Number of complete spins.
                    'callbackFinished' : alertPrize
                }
            });

            // Create new image object in memory.
            let loadedImg = new Image();

            // Create callback to execute once the image has finished loading.
            loadedImg.onload = function()
            {
                theWheel.wheelImage = loadedImg;    // Make wheelImage equal the loaded image object.
                theWheel.draw();                    // Also call draw function to render the wheel.
            }

            // Set the image source, once complete this will trigger the onLoad callback (above).
            loadedImg.src = "planes.png";
            loadedImg.width = "180";
            loadedImg.height = "180";



            // Vars used by the code in this page to do power controls.
            let wheelPower    = 0;
            let wheelSpinning = false;

            // -------------------------------------------------------
            // Function to handle the onClick on the power buttons.
            // -------------------------------------------------------
            function powerSelected(powerLevel)
            {
                // Ensure that power can't be changed while wheel is spinning.
                if (wheelSpinning == false) {
                    // Reset all to grey incase this is not the first time the user has selected the power.
                    document.getElementById('pw1').className = "";
                    document.getElementById('pw2').className = "";
                    document.getElementById('pw3').className = "";

                    // Now light up all cells below-and-including the one selected by changing the class.
                    if (powerLevel >= 1) {
                        document.getElementById('pw1').className = "pw1";
                    }

                    if (powerLevel >= 2) {
                        document.getElementById('pw2').className = "pw2";
                    }

                    if (powerLevel >= 3) {
                        document.getElementById('pw3').className = "pw3";
                    }

                    // Set wheelPower var used when spin button is clicked.
                    wheelPower = powerLevel;

                    // Light up the spin button by changing it's source image and adding a clickable class to it.
                    document.getElementById('spin_button').src = "spin_on.png";
                    document.getElementById('spin_button').className = "clickable";
                }
            }

            // -------------------------------------------------------
            // Click handler for spin button.
            // -------------------------------------------------------
            function startSpin()
            {
                // Ensure that spinning can't be clicked again while already running.
                if (wheelSpinning == false) {
                    // Based on the power level selected adjust the number of spins for the wheel, the more times is has
                    // to rotate with the duration of the animation the quicker the wheel spins.
                    if (wheelPower == 1) {
                        theWheel.animation.spins = 10;
                    } else if (wheelPower == 2) {
                        theWheel.animation.spins = 15;
                    } else if (wheelPower == 3) {
                        theWheel.animation.spins = 18;
                    }

                    // Disable the spin button so can't click again while wheel is spinning.
                    document.getElementById('spin_button').src       = "spin_off.png";
                    document.getElementById('spin_button').className = "";

                    // Begin the spin animation by calling startAnimation on the wheel object.
                    theWheel.startAnimation();

                    // Set to true so that power can't be changed and spin button re-enabled during
                    // the current animation. The user will have to reset before spinning again.
                    wheelSpinning = true;
                }
            }

            // -------------------------------------------------------
            // Function for reset button.
            // -------------------------------------------------------
            function resetWheel()
            {
              location.reload(true);
                theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
                theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
                theWheel.draw();                // Call draw to render changes to the wheel.

                document.getElementById('pw1').className = "";  // Remove all colours from the power level indicators.
                document.getElementById('pw2').className = "";
                document.getElementById('pw3').className = "";

                wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
            }

            // -------------------------------------------------------
            // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters.
            // note the indicated segment is passed in as a parmeter as 99% of the time you will want to know this to inform the user of their prize.
            // -------------------------------------------------------
            function alertPrize(indicatedSegment)
            {
                // Do basic alert of the segment text. You would probably want to do something more interesting with this information.
                //alert("You Won " + indicatedSegment.text);
                var winamount=parseInt(indicatedSegment.text);
                alert(winamount);
                $.ajax({
method: "post",
url : "freemoney.php",
data: {winamount:winamount}

    })
    .done(function(data){
      
      // $('#result12').html(data);
       $('#balance2').html("Balance :"+data+" Rs");
       $('#balance3').html("Balance :"+data+" Rs");
       $('#balance1').val()= data;
    });
            }
        </script>
</body>
</html>
