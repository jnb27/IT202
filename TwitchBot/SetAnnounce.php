<!DOCTYPE html>
<html>

<p> Set Annoucement Below </p>
<button onclick="window.location.href = 'https://web.njit.edu/~jnb27/IT202/TwitchBot/Admin.php';">Back To Profile</button>

<form action = "" method="post">

<textarea id = "Announcements" name = "Announcement" rows = "4" cols = "50"> </textarea>
<input name="submit" type="submit" value="Set">
<button type="button" onclick="AnnounceIt()">Test</button>

</form>

<script>

var announce = document.getElementById('Announcements').value;

function AnnounceIt()
{

alert('<?php echo $announcement; ?>');

}

</script>

</html>

<?php 

$announcement = $_POST['Announcement'];

echo $announcement;
?>