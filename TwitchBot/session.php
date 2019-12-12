
<?php
require('conf.php');
session_start();

$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
$db = new PDO($conn_string, $username, $password);


$user_check = $_SESSION['login_user'];

$into = "SELECT * FROM BotUsers WHERE Username = :user_check";
$result = $db->prepare($into);
$result->execute(array(":user_check"=>$user_check));

$row = $result->fetch(PDO::FETCH_ASSOC);

$login_session = $row['Username'];
$CurrentCoins = $row['Coins'];


?>