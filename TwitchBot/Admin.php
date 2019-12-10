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

<a href="https://web.njit.edu/~jnb27/IT202/TwitchBot/SetAnnounce.php"> Change Announcement </a>
<br></br>


<p> <b> Edit Profile Background  </b> </p>
<input type="button" onclick="changeBack('red');" value="Red">
<input type="button" onclick="changeBack('blue');" value="Blue">
<input type="button" onclick="changeBack('green');" value="Green">
<input type="button" onclick="changeBack('purple');" value="Purple">
<br></br>

<form action = "" method="post">
<input id="name" name="username" placeholder="Username" type="text">
<input id="MoreCoin" name="MoreCoins" placeholder="Edit Coins" type="number">

<input name="submit" type="submit" value="Confirm">
</form>

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

$row = $result->fetchAll(PDO::FETCH_ASSOC);

echo "<br><pre>" . var_export($row, true) . "</pre><br>";


if(isset($_POST['username']) && isset($_POST['MoreCoins']) && empty($_POST['LessCoins']))
{

//So technically this was supposed to add coins but I only needed admins to edit coin amounts not differentiate between + / -

$user_check = $_POST['username'];

$into = "SELECT * FROM BotUsers WHERE Username = :user_check";
$result2 = $db->prepare($into);
$result2->execute(array(":user_check"=>$user_check));
$row2 = $result->fetch(PDO::FETCH_ASSOC);

$CurrentCoins = $row2['Coins']; 
$coinsAdd = $_POST['MoreCoins'];

$newTotal = $CurrentCoins + $coinsAdd;

$update = "UPDATE `jnb27`.`BotUsers` SET `Coins` = '$newTotal' WHERE `BotUsers`.`Username` = '$user_check'";
$result3 = $db->prepare($update);
$result3->execute();


}


?>
