<?php
$conn=mysqli_connect("localhost","root","");
$base_url = "http://" . $_SERVER['SERVER_NAME'].'/';
if($conn==false)
{
	echo "Error while connecting";
}
mysqli_select_db($conn,"jackpot");
?>