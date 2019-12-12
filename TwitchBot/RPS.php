<?php
require('conf.php');
session_start();

$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
$db = new PDO($conn_string, $username, $password);

$user_check = $_SESSION['login_user'];

$into = "SELECT * FROM BotUsers WHERE Username = :user_check";
$result = $db->prepare($into);
$result->execute(array(":user_check"=>$user_check));
$CurrentCoins = $row['Coins'];

?>


<!DOCTYPE html>
<html>
<head>
<title>High Low Minigame</title>
</head>
<body onload="hidethis()" >
<h1> Welcome to Rock Paper Scissors ! </h1>
<h2> Instructions </h2>
<p> This game is very simple, Choose your option.</p>
<p> All you gotta do is beat the cpu at rock paper scissors, nothing too hard.  If you get it right you earn coins. </p>
</body>

<button type="button" onclick="Rock()">Rock</button>
<button type="button" onclick="Paper()">Paper</button>
<button type="button" onclick="Scissors()">Scissors</button>

<button id="Claim" type="button" onclick="TakeWinnings()" >Claim Coins</button>

<button onclick="window.location.href = 'https://web.njit.edu/~jnb27/IT202/TwitchBot/Profile.php';">Back To Profile</button>


<script>

var cpuRPS;

function hidethis()
{
  document.getElementById("Claim").style.visibility = "hidden";
}

function Rock()
{
  cpuRPS = Math.floor(Math.random() * 3);
  // Rock was picked, check for if scissors then win if not then lose 0 is rock 1 is scissors 2 is paper
  if ( cpuRPS == 1)
    { 
      alert("You won !");
      cpuRPS = null;
      document.getElementById("Claim").style.visibility = "visible";
    
    }
    else{
    alert("You Lost.");
    }

}

function Paper()
{
  cpuRPS = Math.floor(Math.random() * 3);
  
  if ( cpuRPS == 0)
    { 
      alert("You won !");
      cpuRPS = null;
      document.getElementById("Claim").style.visibility = "visible";
    
    }
    else{
    alert("You Lost.");
    }


}

function Scissors()
{
  cpuRPS = Math.floor(Math.random() * 3);

  if ( cpuRPS == 2)
    { 
      alert("You won !");
      cpuRPS = null;
      document.getElementById("Claim").style.visibility = "visible";
    
    }
    else{
    alert("You Lost.");
    }

}

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




</script>


</html>