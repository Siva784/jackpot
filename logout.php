<html>
<head>
</head>
<body>
<?php
session_start();
session_destroy();
echo "<script>alert('successfully LOGGEDOUT')</script>";
echo "<script>location.href='index.php'</script>";
?>


</body>
</html>
