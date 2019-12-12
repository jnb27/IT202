<!-- This is gonna be a very basic about page with a home and redirects to login and Registration-->

</html>

<?php 

include('conf.php');

?>

<!DOCTYPE html>
<html>

<h1> Welcome to the very basic game page. </h1>


<p> I made these webpages for a class project and I was having some fun with it. Originally this idea was supposed to be a Twitch Bot but after some consideration I changed it up to a game site. As you can see the remains of the TwitchBot in the url. </p>

<p> So far the website has two working games that reward coins. </p>

<p> The first game is a simple HighLow Game where you guess if a randomly generated number will be higher or lower <p>


<p> The second game is a Double or Nothing game which could lead to pretty high coin payouts. <p>


<p> You can play them if you're logged in ! </p>

<a href= "https://web.njit.edu/~jnb27/IT202/TwitchBot/HL.php">High Low</a>

<a href="https://web.njit.edu/~jnb27/IT202/TwitchBot/DON.php">Double or Nothing</a>


<a href="https://web.njit.edu/~jnb27/IT202/TwitchBot/LoginTest.php">Login</a>

<a href="https://web.njit.edu/~jnb27/IT202/TwitchBot/Register.php">Register</a>

<button onclick="window.location.href = 'https://web.njit.edu/~jnb27/IT202/TwitchBot/Profile.php';">Back To Profile</button>

<p> <i>  <b> Announcement ! </i> </b> </p>
<p> <?php echo $announcement; ?> </p>




