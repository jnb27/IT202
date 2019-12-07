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


<br><b id="HighLow"><a href="HL.php">High Low Game </a></b></br>
<b id="HighLow"><a href="DON.php">Double or Nothing Game </a></b>
<br></br>
<a href="https://web.njit.edu/~jnb27/IT202/TwitchBot/About.php"> About Page </a>

<p> <strong> Free Coin Bonus! </strong> </p>
<button id="Claim" type="button" onclick="TakeWinnings()" >Claim Coins</button>


<p> <b> Edit Profile Background  </b> </p>
<input type="button" onclick="changeBack('red');" value="Red">
<input type="button" onclick="changeBack('blue');" value="Blue">
<input type="button" onclick="changeBack('green');" value="Green">
<input type="button" onclick="changeBack('purple');" value="Purple">

</div>
</body>

<script>

function TakeWinnings()
{

//Add coins Earned to coins in database
let xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200)
          {
          document.getElementById("AjaxTest").innerHTML = this.responseText;
          }
      }

xhttp.open("POST", "UpdateCoins.php",true);
xhttp.send();
document.getElementById("Claim").style.visibility = "hidden";
}


function changeBack(color)
{

document.body.style.background = color;

}

</script>

</html>
