<?php
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//pull in config.php so we can access the variables from it
require('conf.php');
echo "Loaded Host: " . $host;
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";

try{
	$db = new PDO($conn_string, $username, $password);
	echo "Connected";

	//create table
	$query = "create table if not exists `TestUsers`(
		`id` int auto_increment not null,
		`username` varchar(30) not null unique,
		`pin` int default 0,
		PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$stmt = $db->prepare($query);
	print_r($stmt->errorInfo());
	$r = $stmt->execute();

	echo "<br>" . ($r>0?"Created table or already exists":"Failed to create table") . "<br>";
	unset($r);

	//simple insert
	//TODO/homework make values variables bindable
	$insert_query = "INSERT INTO `TestUsers`( `username`, `pin`) VALUES (:username , :pin)";
	$stmt = $db->prepare($insert_query);
	
	$user = "Bohn Bobe";
	$pin = 1234;
	$r = $stmt->execute(array(':username' => $user, ':pin' => $pin));

	//TODO catch error from DB
	echo "<br>" . ($r>0?"Insert successful":"Insert failed") . "<br>";
	
	//TODO select query using bindable :username is where clause
	$select_query="select * from `TestUsers` where username = :username";
	$stmt = $db->prepare($select_query);
	$r = $stmt->execute(array(":username"=> "Bohn Bobe"));
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	echo "<br><pre>" . var_export($result, true) . "</pre><br>";
}
catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}
?>

