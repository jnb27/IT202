<?php 

echo "<pre>" . var_export($_GET, true) . "</pre>";

if(isset($_GET['name'])){
	echo "<br>Hello, " . $_GET['name'] . "<br>";
}


if(isset($_GET['number1'])){
	$number1 = $_GET['number1'];
	echo "<br>" . $number1 . " should be a number...";
	echo "<br>but it might not be<br>";
}

if(isset($_GET['number2'])){
	$number2 = $_GET['number2'];
	echo "<br>" . $number2 . " should be a number...";
	echo "<br>but it might not be<br>";
}

$check = is_numeric($number1) && is_numeric($number2);


if($check){

echo "Here's an addition of two numbers: " . ((int)$number1+(int)$number2) ; 
echo "<br>" . "Here's a concatenation of two variables " .  $number1 . $number2; 


}
else
{

echo "One or both of these are not numbers, or you have set no values in the address bar. The variables are number1 and number2 .  ";

}

?>
