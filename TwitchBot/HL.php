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
<body>
<h1> Welcome to the High Low MiniGame </h1>
<h2> Instructions </h2>
<p> This game is very simple, once you hit start a number will be randomly generated.</p>
<p> As the user your only job is to pick one of the two buttons, which will be your guess. Is the next number generated higher or lower? If you get it right you earn coins. </p>
</body>

<button onclick="window.location.href = 'https://web.njit.edu/~jnb27/IT202/TwitchBot/Profile.php';">Back To Profile</button>

<p id ="NumHolder"> The first number will be generated here</p>
<p id ="NextNumber"> Your number will be place here </p>

<script>

var NumStart;
var NextNum; 
var CoinsEarned = 10;


function StartGame()
{
NumStart = Math.floor(Math.random() * 101);
document.getElementById("NumHolder").innerHTML = NumStart;
document.getElementById("NextNumber").innerHTML = 'Your number';
document.getElementById("Claim").style.visibility = "hidden";
}

function HigherGuess()
{
  if(NumStart == null)
    {alert("You should start the game first.."); }
    else{
    NextNum = Math.floor(Math.random() * 101);
    document.getElementById("NextNumber").innerHTML = NextNum;
    
    if(NextNum > NumStart)
      {
      //When win add coins
      
        
        alert("You won!");
        document.getElementById("NumHolder").innerHTML = NumStart;
        NumStart = null;
        document.getElementById("Claim").style.visibility = "visible";
        
      }
      else{
       
        alert("Sorry you lost.");
        document.getElementById("NumHolder").innerHTML = NumStart;
         NumStart = null;
      }
    }
}

function LowerGuess()
{
    if(NumStart == null)
      { alert("You should probably start the game first.."); }
      else{
      NextNum = Math.floor(Math.random() * 101);
    
    document.getElementById("NextNumber").innerHTML = NextNum;
    if(NextNum < NumStart)
      {
        //When win add coins
        
        
        alert("You won!");
        document.getElementById("NumHolder").innerHTML = NumStart;
        NumStart = null;
        document.getElementById("Claim").style.visibility = "visible";
        
      }
      else{
        
        alert("Sorry you lost.");
        document.getElementById("NumHolder").innerHTML = NumStart;
        NumStart = null;
      }
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

<button type="button" onclick="StartGame()">Start</button>
<button type="button" onclick="HigherGuess()">Higher</button>
<button type="button" onclick="LowerGuess()">Lower</button>

<button id="Claim" type="button" onclick="TakeWinnings()" >Claim Coins</button>


</html>