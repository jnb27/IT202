<!DOCTYPE html>
<html>
<head>
<title>Double Or Nothing</title>
</head>
<body>
<h1> Welcome to the Double Or Nothing </h1>
<h2> Instructions </h2>
<p> This game is very simple, first you bet 5 coins, and then a coinflip will be done</p>
<p> As the user your only job is to pick one of the two buttons, which will be your guess. Is the next number generated higher or lower? If you get it right you earn coins, you are also able to roll again and double your payout.</p>
<p id="result">Results will be placed here </p>
<p id="AjaxTest">Connection testing here </p>
</body>

<button onclick="window.location.href = 'https://web.njit.edu/~jnb27/IT202/TwitchBot/Profile.php';">Back To Profile</button>
<script>

var coinsBet;
var coinsEarned;
var HouseNumber;

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

}

function BetHeads()
{
    HouseNumber = Math.floor(Math.random() * 101);
    if(HouseNumber < 50)
    {
      //This result is heads
      document.getElementById("result").innerHTML = 'You correctly guessed heads, do you want to try and double it? If not, please hit take winnings.';
      coinsEarned = coinsBet * 2;
    }
    else{
      document.getElementById("result").innerHTML = 'Your guess was incorrect. It was actually tails';
      //Subtract 5 coins
      coinsEarned = 0;
      }
    
    
}



function BetTails()
{
    HouseNumber = Math.floor(Math.random() * 101);
    if(HouseNumber >= 50)
    {
      //This result is tails
       document.getElementById("result").innerHTML = 'You correctly guessed tails, do you want to try and double it?';
    }
    else{
     document.getElementById("result").innerHTML = 'Your guess was incorrect. It was actually heads.';
     //Subtract Coins
     coinsEarned = 0;
    }
}

</script>

<button type="button" onclick="BetHeads()">Heads</button>
<button type="button" onclick="BetTails()">Tails</button>

</html>