<?php
    $lusername=$_POST['lusername'];
    $lpassword=$_POST['lpassword'];
    include('connection.php');
    $query="SELECT  `username` FROM `users` WHERE username='$lusername'";
    $result=mysqli_query($conn,$query);
    $num_rows = mysqli_num_rows($result);
    
    if($num_rows==0)
    {
        echo "<script>alert('Invalid username')</script>";
        echo "<script>location.href='index.php'</script>";
    }
    else
    {
        while($row=mysqli_fetch_row($result))
        {
            $username=$row[0];
        }
        $query1="SELECT  `password` FROM `users` WHERE username='$lusername'";
        $result1=mysqli_query($conn,$query1);
        while($row1=mysqli_fetch_row($result1))
        {
            $password=$row1[0];
        }

        if($lpassword==$password)
        {
            session_start();
            $_SESSION['username']=$username;
            echo "<script>location.href='main.php'</script>";
        }
        else
        {
            echo "<script>alert('incorrect password')</script>";
            echo "<script>location.href='index.php'</script>";
        }
    }
?>