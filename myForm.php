<?php 
function getName()
{
	if(isset($_GET['name']))
	{
		echo "<p>Hello, " . $_GET['name'] . "</p>";
	}


}
?>
<html>
	<head></head>
		<body>

<?php getName();?>
	<form mode="GET" method="POST" action="myForm.php">
	
	<input name="name" type="text" placeholder="Enter your username"/>
	<input name="password" type="password" placeholder="Enter a password"/>
	<input name="cpassword" type="password" placeholder="Confirm your password"/>

			
	<!--
	<input name="number" type="number" placeholder="Enter a number"/>

	<label for="Yes">Yes</label>
	<input type="radio" name="radio" id="Yes" value="Yes"/>
	<label for="No">No</label>
	<input type="radio" name="radio" id="No" value="No"/>
         --> 
         <!--this is a comment-->
	<!--
	<select name="dropdown">
		<option value="1">One</option>
		<option value="2">Two</option>
		<option value="3">Three</option>
	</select>
	-->
	<!-- <input type="checkbox" name="check"/>-->
	<!-- <textarea name="text"></textarea> -->
	<!-- <input type="date" name="date"/> -->
	
	<input type="submit" value="Try it"/>
	<input type="reset" value="Clear form"/>

</form>
</body>
</html>

<?php
if(isset($_GET))
{
	echo "<br><pre>" . var_export($_GET, true) . "</pre><br>";
}

        $user=$_POST['name'];
        $pass=$_POST['password'];
        $cpass=$_POST['cpassword'];
	
	
	if($pass == $cpass && $pass != "")
	{	
		echo "Login Successful";
	}
	if($pass != $cpass && $pass != "")
	{
		echo "The passwords do not match";
	}

?>

