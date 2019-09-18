<?php

//Loading the Config

require('conf.php');
echo "Loaded host " . $host;

try{
	$conn_string = "mysql:host=$host;dbname=$databasename;charset=utf8mb4";
	$db = new PDO($conn_string, $username, $password);
	echo "Connected";
	$query = "create table if not exists `TestUsers`(
		`id` int auto_increment not null,
		`username` carchar(3) not null unique,
		`pin` int default 0, 
		PRIMARY KEY (`id)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";
	$stmt = $db->prepare($query);
	$r = $stmt->execute();
	echo "<br>" . $r . "<br>";
}
catch(Exception $e){
	echo $e->getMessage();
	echo "Something went wrong";
}

?>
