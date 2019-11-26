<?php

include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
<title> A Home Page</title>
<link href="style2.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome: <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="Logout.php"> Log Out</a></b>
<b id="Coins">Your Coins: <i><?php echo $CurrentCoins; ?></i></b>
<br><b id="HighLow"><a href="HL.php">High Low Game </a></b></br>
<b id="HighLow"><a href="DON.php">Double or Nothing Game </a></b>
</div>
</body>
</html>
