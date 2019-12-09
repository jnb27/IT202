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
<p id="Coins"><strong>Your Coins: <i><?php echo $CurrentCoins; ?></i></strong></p>


<a href="https://web.njit.edu/~jnb27/IT202/TwitchBot/About.php"> About Page </a>
<br></br>

<textarea id = "Announcements" rows = "4" cols = "50"> Post Announcement here</textarea>

<p> <b> Edit Profile Background  </b> </p>
<input type="button" onclick="changeBack('red');" value="Red">
<input type="button" onclick="changeBack('blue');" value="Blue">
<input type="button" onclick="changeBack('green');" value="Green">
<input type="button" onclick="changeBack('purple');" value="Purple">


</div>
</body>

<script>

function changeBack(color)
{

document.body.style.background = color;

}

</script>

</html>

<?php


$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
$db = new PDO($conn_string, $username, $password);
$into = "SELECT Username, Coins FROM BotUsers";
$result = $db->prepare($into);
$result->execute(array());

$row = $result->fetch(PDO::FETCH_ASSOC);

echo $row['Username'];
echo $row['Coins'];

?>