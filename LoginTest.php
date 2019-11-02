<?php

include('LoginScript.php');
if(isset($_SESSION['login_user'])){
header("location: Profile.php");  }
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Form Milestone</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="login">
<h2> Login </h2>
<form action = "" method="post">
<label>Username: </label>
<input id="name" name="username" placeholder="uesrname" type="text">
<label>Password: </label>
<input id="password" name="password" placeholder="Enter Password" type="password">
<br></br>
<input name="submit" type="submit" value="Login">
<span><?php echo $error; ?></span>
</form>
</div>
</body>
</html>
