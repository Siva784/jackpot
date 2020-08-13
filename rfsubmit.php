<?php 
$name=addslashes(trim($_POST['name']));
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$spin=$_POST['spin'];
include('connection.php');
$query="SELECT  `email` FROM `users` WHERE email='$email'";
$result=mysqli_query($conn,$query);
$num_rows = mysqli_num_rows($result);

$query1="SELECT  `username` FROM `users` WHERE username='$username'";
$result1=mysqli_query($conn,$query1);
$num_rows1 = mysqli_num_rows($result1);
if($num_rows>0)
{
echo "<script>alert('user with email already exists')</script>";
echo "<script>location.href='registerform.php'</script>";
}
else if($num_rows1>0)
{
echo "<script>alert('user with username already exists')</script>";
echo "<script>location.href='registerform.php'</script>";
}
else
{
    $query2="INSERT INTO `users`( `name`, `email`, `username`, `password` , `spin`) VALUES ('$name','$email','$username','$password','$spin')";
    $result=mysqli_query($conn,$query2);

    if($query2 && $conn && $result)
    {
        echo "<script>alert('hi $name your data submitted')</script>";
        echo "<script>location.href='index.php'</script>";

    }
    else
    {
        echo "<script>your data is not submitted(connection ERROR)</script>";
        echo "<script>location.href='registerform.php'</script>";
    }
}
?>