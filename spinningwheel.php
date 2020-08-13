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
  <!-- <link rel="stylesheet" href="main2.css" type="text/css" /> -->
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

      
<h3>steps to play :</h3>
<ol><li>click "spin" to spin the the wheel.</li><li>Automatically the result amount will be credited/debited in your balance.</li><li>Click play again to continue the Game.</li></ol>
       <br>    <p id="balance3"></p>
            <script>       
             document.getElementById('balance3').innerHTML="Balance : "+balance+" Rs";



</script>
  
<br><br><br>
<table cellpadding="0" cellspacing="0" border="0">
            <tr>
            <td width="300" height="300" class="the_wheel" align="center" valign="center">
              <img src="selector1.png">
                    <canvas id="canvas" width="300" height="240">
                        <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                    </canvas>
                    <p id="spinnedvalue"></p>
                </td>
  </tr></table><table><tr>
                <td>
                    <div class="power_controls" align="center">
                        <br />
                        <br />
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
                        <br />
                    <button id="spinstat" onClick="startSpin();" > <img id="spin_button" src="spin_on.png" alt="Spin" align="center"/></button>
                        <br /><br />
                        &nbsp;&nbsp;<button onClick="resetWheel(); return false;" id="playagain1">Play Again</button><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </td>
                
            </tr>
        </table>
        

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

if(balance<75)
{
  document.getElementById('playagain1').disabled= true;
  document.getElementById('spinstat').disabled= true;

  document.getElementById('spinnedvalue').innerHTML="Balance should be atleast 75 Rs to continue this game";


}
            // Create new wheel object specifying the parameters at creation time.
            let theWheel = new Winwheel({
                'outerRadius'     : 120,        // Set outer radius so wheel fits inside the background.
                'innerRadius'     : 15,         // Make wheel hollow so segments don't go all way to center.
                'textFontSize'    : 12,         // Set default font size for the segments.
                //'textOrientation' : 'vertical', // Make text vertial so goes down from the outside of wheel.
                'textAlignment'   : 'outer',    // Align text to outside of wheel.
                'numSegments'     : 12,         // Specify number of segments.
                'segments'        :             // Define segments including colour and text.
                [                               // font size and test colour overridden on backrupt segments.
                   {'fillStyle' : '#ee1c24', 'text' : '+10'},
                   {'fillStyle' : '#3cb878', 'text' : '-10'},
                   {'fillStyle' : '#f6989d', 'text' : '0'},
                   {'fillStyle' : '#00aef0', 'text' : '-25'},
                   {'fillStyle' : '#f26522', 'text' : '+25'},
                   {'fillStyle' : '#ee1c24', 'text' : '0'},
                   {'fillStyle' : '#e70697', 'text' : '-90'},
                   {'fillStyle' : '#fff200', 'text' : '-50'},
                   {'fillStyle' : '#f6989d', 'text' : '0'},
                   {'fillStyle' : '#ee1c24', 'text' : '-75'},
                   {'fillStyle' : '#3cb878', 'text' : '-100'},
                   {'fillStyle' : '#f26522', 'text' : '0'},
                  
                ],
                'animation' :           // Specify the animation to use.
                {
                    'type'     : 'spinToStop',
                    'duration' : 15,    // Duration in seconds.
                    'spins'    : 5,     // Default number of complete spins.
                    'callbackFinished' : alertPrize,
                    'callbackSound'    : playSound,   // Function to call when the tick sound is to be triggered.
                    'soundTrigger'     : 'pin'        // Specify pins are to trigger the sound, the other option is 'segment'.
                },
                'pins' :				// Turn pins on.
                {
                    'number'     : 12,
                    'fillStyle'  : 'silver',
                    'outerRadius': 4,
                }
            });

            // Loads the tick audio sound in to an audio object.
            let audio = new Audio('tick.mp3');

            // This function is called when the sound is to be played.
            function playSound()
            {
                // Stop and rewind the sound if it already happens to be playing.
                audio.pause();
                audio.currentTime = 0;

                // Play the sound.
                audio.play();
            }

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
                document.getElementById('playagain1').disabled= true;
                document.getElementById('spinstat').disabled= true;

                

                if (wheelSpinning == false) {
                    // Based on the power level selected adjust the number of spins for the wheel, the more times is has
                    // to rotate with the duration of the animation the quicker the wheel spins.
                    if (wheelPower == 1) {
                        theWheel.animation.spins = 3;
                    } else if (wheelPower == 2) {
                        theWheel.animation.spins = 6;
                    } else if (wheelPower == 3) {
                        theWheel.animation.spins = 10;
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

               // document.getElementById('pw1').className = "";  // Remove all colours from the power level indicators.
                document.getElementById('pw2').className = "";
                document.getElementById('pw3').className = "";

                wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
            }

            // -------------------------------------------------------
            // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters.
            // -------------------------------------------------------
            function alertPrize(indicatedSegment)
            {

                // Just alert to the user what happened.
                // In a real project probably want to do something more interesting than this with the result.
                // if (indicatedSegment.text == 'LOOSE TURN') {
                //     alert('Sorry but you loose a turn.');
                // } else if (indicatedSegment.text == 'BANKRUPT') {
                //     alert('Oh no, you have gone BANKRUPT!');
                // } else {
                //     alert("You have won " + indicatedSegment.text);
                // }
                var spinnedvalue=indicatedSegment.text;
                  if(spinnedvalue!=0)
                  {
                    $.ajax({
                            method: "post",
                            url : "spinwheelmoney.php",
                            data: {spinnedvalue:spinnedvalue}

                            })
                            .done(function(data){
                              var d = JSON.parse(data);
                              $('#spinnedvalue').html(d.spinstatus);
                              $('#balance2').html("Balance :"+d.balance+" Rs");
                              $('#balance3').html("Balance :"+d.balance+" Rs");
                              $('#balance1').val()= d.balance;
                            });

                            document.getElementById('playagain1').disabled= false;

                  }
                  else
                  {
                    document.getElementById('spinnedvalue').innerHTML = "Spinner Value : "+spinnedvalue;
                    document.getElementById('playagain1').disabled= false;

                  }

            }
        </script>

</body>
</html>
