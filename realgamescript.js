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





