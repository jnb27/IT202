<?php

include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: LoginTest.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title> A Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome: <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="Logout.php"> Log Out</a></b>
</div>
</body>
</html>