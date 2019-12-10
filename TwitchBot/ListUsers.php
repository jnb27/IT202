<?php

$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
$db = new PDO($conn_string, $username, $password);

$into = "SELECT Username, Coins FROM BotUsers";
$result = $db->prepare($into);
$result->execute(array());
$row = $result->fetch(PDO::FETCH_ASSOC);

echo $row;






?>