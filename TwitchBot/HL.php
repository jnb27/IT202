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
var UserGuess;

function StartGame()
{
NumStart = Math.floor(Math.random() * 101);
document.getElementById("NumHolder").innerHTML = NumStart;
document.getElementById("NextNumber").innerHTML = 'Your number';
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
      
        NumStart = null;
        alert("You won!");
        document.getElementById("NumHolder").innerHTML = NumStart;
      }
      else{
        NumStart = null;
        alert("Sorry you lost.");
        document.getElementById("NumHolder").innerHTML = NumStart;
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
        
        NumStart = null;
        alert("You won!");
        document.getElementById("NumHolder").innerHTML = NumStart;
        
      }
      else{
        NumStart = null;
        alert("Sorry you lost.");
        document.getElementById("NumHolder").innerHTML = NumStart;
        
      }
    }
}
</script>

<button type="button" onclick="StartGame()">Start</button>
<button type="button" onclick="HigherGuess()">Higher</button>
<button type="button" onclick="LowerGuess()">Lower</button>

</html>